<?php
session_start();
require_once '../config/db_connect.php';

// Security Guard: Ensure only logged-in administrators can view this dataset
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit;
}

// Activity logging helper context function
function logAdminAction($conn, $action, $details) {
    $user = 'Geo Admin';
    $action = mysqli_real_escape_string($conn, $action);
    $details = mysqli_real_escape_string($conn, $details);
    mysqli_query($conn, "INSERT INTO activity_logs (user, action, details) VALUES ('$user', '$action', '$details')");
}

/* =========================================
   ACTION HANDLER: CURATE APPLICATION STATUS
========================================= */
if (isset($_GET['action']) && isset($_GET['app_id'])) {
    $app_id = (int)$_GET['app_id'];
    $action = $_GET['action'];
    
    if ($action === 'accept') {
        mysqli_query($conn, "UPDATE applications SET status = 'Accepted' WHERE id = $app_id");
        logAdminAction($conn, 'Status Change', "Accepted student application ID: $app_id");
        // FUTURE PHASE TRIGGER: FPDF and QR code generation hooks will loop right here!
    } elseif ($action === 'reject') {
        mysqli_query($conn, "UPDATE applications SET status = 'Rejected' WHERE id = $app_id");
        logAdminAction($conn, 'Status Change', "Rejected student application ID: $app_id");
    }
    header("Location: manage_applications.php");
    exit;
}

// Global metric counters
$totalApps = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM applications"))['total'] ?? 0;
$pendingApps = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM applications WHERE status = 'Pending'"))['total'] ?? 0;
$acceptedApps = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM applications WHERE status = 'Accepted'"))['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: sans-serif; }
        .sidebar { width: 260px; height: 100vh; position: fixed; background: #fff; border-right: 1px solid #ddd; top: 0; left: 0; }
        .main-content { margin-left: 260px; padding: 30px; }
        .nav-link { color: #333; padding: 12px 20px; display: block; text-decoration: none; }
        .nav-link:hover { background: #f8f9fa; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="p-3 border-bottom"><h5>Admin Portal</h5></div>
        <a href="../index.php" class="nav-link text-primary fw-bold border-bottom"><i class="fas fa-external-link-alt me-2"></i>Go to Public Site</a>
        <a href="admin.php?page=dashboard" class="nav-link mt-2"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a href="manage_applications.php" class="nav-link active bg-light text-primary fw-bold"><i class="fas fa-file-signature me-2"></i>Applications Portal</a>
        <a href="admin.php?logout=true" class="nav-link text-danger mt-5"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 style="color: #1a365d; font-weight: 700;">Student Admission Desk</h3>
                <p class="text-muted small mb-0">Evaluate student applications, update baseline status configurations, and export reporting tables.</p>
            </div>
            <a href="export_excel.php" class="btn btn-success shadow-sm fw-bold"><i class="fas fa-file-excel me-2"></i>Export Dataset to Excel</a>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white text-dark">
                    <small class="text-uppercase text-muted fw-bold">Total Requests Received</small>
                    <h2 class="mb-0 fw-bold text-primary"><?php echo $totalApps; ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white text-dark">
                    <small class="text-uppercase text-muted fw-bold">Pending Evaluation</small>
                    <h2 class="mb-0 fw-bold text-warning"><?php echo $pendingApps; ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white text-dark">
                    <small class="text-uppercase text-muted fw-bold">Approved Admissions</small>
                    <h2 class="mb-0 fw-bold text-success"><?php echo $acceptedApps; ?></h2>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Student Identity & Contacts</th>
                            <th>Target Engineering Branch</th>
                            <th>Attached Mark Sheets</th>
                            <th>Status Badge</th>
                            <th>Finance State</th>
                            <th class="text-center">Review Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = mysqli_query($conn, "SELECT * FROM applications ORDER BY id DESC");
                        if (mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) {
                                // Formulate UI Display Badges for Review Status
                                $statusBadge = '<span class="badge bg-warning text-dark">Pending</span>';
                                if ($row['status'] === 'Accepted') $statusBadge = '<span class="badge bg-success">Accepted</span>';
                                if ($row['status'] === 'Rejected') $statusBadge = '<span class="badge bg-danger">Rejected</span>';
                                
                                // Formulate UI Display Badges for Tuition Status
                                $feeBadge = $row['fee_status'] === 'Paid' ? '<span class="badge bg-success"><i class="fas fa-check me-1"></i>Paid</span>' : '<span class="badge bg-secondary">Unpaid</span>';
                                
                                echo "<tr>
                                    <td class='ps-3'>
                                        <h6 class='mb-0 fw-bold text-dark'>".htmlspecialchars($row['full_name'])."</h6>
                                        <small class='text-muted d-block'><i class='fas fa-envelope me-1'></i>".htmlspecialchars($row['email'])."</small>
                                        <small class='text-muted d-block'><i class='fas fa-phone me-1'></i>".htmlspecialchars($row['phone'])."</small>
                                    </td>
                                    <td><span class='fw-semibold text-primary'>{$row['course']}</span></td>
                                    <td>
                                        <a href='../{$row['document_path']}' target='_blank' class='btn btn-outline-primary btn-sm'><i class='fas fa-file-pdf me-1'></i>View Credentials</a>
                                    </td>
                                    <td>{$statusBadge}</td>
                                    <td>{$feeBadge}</td>
                                    <td class='text-center'>
                                        <div class='btn-group' role='group'>
                                            <a href='manage_applications.php?action=accept&app_id={$row['id']}' class='btn btn-success btn-sm ".($row['status'] !== 'Pending' ? 'disabled' : '')."'><i class='fas fa-user-check me-1'></i>Accept</a>
                                            <a href='manage_applications.php?action=reject&app_id={$row['id']}' class='btn btn-danger btn-sm ".($row['status'] !== 'Pending' ? 'disabled' : '')."'><i class='fas fa-user-times me-1'></i>Reject</a>
                                        </div>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-5 text-muted'><i class='fas fa-folder-open fa-2x d-block mb-2'></i>No applications logged into the system table yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>