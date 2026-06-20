<?php
session_start();
require_once '../config/db_connect.php';

require_once '../vendor/autoload.php';
require_once '../vendor/PHPMailer/src/Exception.php';
require_once '../vendor/PHPMailer/src/PHPMailer.php';
require_once '../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit;
}

function logAdminAction($conn, $action, $details) {
    $user = 'Geo Admin';
    $action = mysqli_real_escape_string($conn, $action);
    $details = mysqli_real_escape_string($conn, $details);
    mysqli_query($conn, "INSERT INTO activity_logs (user, action, details) VALUES ('$user', '$action', '$details')");
}

if (isset($_GET['action']) && isset($_GET['app_id'])) {
    $app_id = (int)$_GET['app_id'];
    $action = $_GET['action'];

    $student_query = mysqli_query($conn, "SELECT * FROM applications WHERE id = $app_id LIMIT 1");
    $student = mysqli_fetch_assoc($student_query);

    if ($student) {
        $student_email = $student['email'];
        $student_name = $student['full_name'];
        $student_course = $student['course'];

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   = true;
            $mail->Username   = 'gppoffiacial@gmail.com'; 
            $mail->Password   = 'tawq izkv vthl fwue';   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('gppoffiacial@gmail.com', 'GPP Admission Desk');
            $mail->addAddress($student_email, $student_name);
            $mail->isHTML(true);

            if ($action === 'accept') {
                mysqli_query($conn, "UPDATE applications SET status = 'Accepted' WHERE id = $app_id");
                logAdminAction($conn, 'Status Change', "Accepted student application ID: $app_id");

                if(!defined('FPDF_FONTPATH')) {
                    define('FPDF_FONTPATH', __DIR__ . '/font/'); 
                }

                require_once 'fpdf.php';
                include_once "phpqrcode/qrlib.php";

                $token = "GPP_APP_" . $student['id'] . "_" . strtoupper(substr($student['full_name'] ?? 'STU', 0, 3));
                $qr_storage_folder = "qr_images/";
                if (!is_dir($qr_storage_folder)) { mkdir($qr_storage_folder, 0755, true); }
                $image_path = $qr_storage_folder . $token . ".png";
                $pay_endpoint_url = "http://localhost/GPP-WEB-ORGANIZED/pay_fee.php?id=" . $student['id'] . "&token=" . $token;
                QRcode::png($pay_endpoint_url, $image_path, QR_ECLEVEL_H, 4);

                $pdf = new FPDF('P', 'mm', array(210, 297));
                $pdf->AddPage();

                if (file_exists('../assets/images/main logo.jpeg')) { 
                    $pdf->Image('../assets/images/main logo.jpeg', 12, 10, 24, 24); 
                }

                $pdf->SetXY(40, 13); 
                $pdf->SetFont('Arial', 'B', 14); 
                $pdf->Cell(0, 6, 'COMPUTER ENGINEERING DEPARTMENT', 0, 1, 'L');

                $pdf->SetX(40); 
                $pdf->SetFont('Arial', '', 10); 
                $pdf->Cell(0, 5, 'Government Polytechnic, Porbandar, Gujarat', 0, 1, 'L');

                $pdf->Ln(4);
                $pdf->Line(10, 38, 200, 38);
                $pdf->Ln(3);

                $pdf->SetFont('Helvetica', 'B', 12); 
                $pdf->Cell(0, 8, 'OFFICIAL PROVISIONAL SELECTION LETTER', 0, 1, 'C');  
                $pdf->Ln(3);

                $pdf->SetFont('Helvetica', '', 11); 
                $pdf->Cell(0, 5, 'Dear ' . strtoupper($student_name) . ',', 0, 1, 'L'); 
                $pdf->Ln(3);

                $pdf->MultiCell(0, 6, "We are pleased to inform you that your application has been evaluated and successfully APPROVED for admission into the course program detailed below:", 0, 'L'); 
                $pdf->Ln(4);

                $pdf->SetFillColor(245, 245, 245); 
                $pdf->SetFont('Helvetica', 'B', 11); 
                $pdf->Cell(50, 8, ' Allotted Course:', 1, 0, 'L', true);
                $pdf->SetFont('Helvetica', '', 11); 
                $pdf->Cell(0, 8, ' ' . $student_course, 1, 1, 'L'); 
                $pdf->Ln(5);

                $pdf->MultiCell(0, 6, "To secure your seat permanently, please scan the QR code embedded below or access your portal profile to settle the provisional tuition fee payment.", 0, 'L'); 
                $pdf->Ln(6);

                if (file_exists($image_path)) {
                    if ($pdf->GetY() > 240) { $pdf->AddPage(); }  
                    $pdf->Image($image_path, 12, $pdf->GetY(), 40, 40);
                    $pdf->Ln(45);
                }

                $temp_pdf_path = tempnam(sys_get_temp_dir(), 'GPP_') . '.pdf';
                $pdf->Output($temp_pdf_path, 'F'); 
                $mail->addAttachment($temp_pdf_path, 'GPP_Allotment_Letter.pdf');

                $mail->Subject = 'Admission Approved - Government Polytechnic Porbandar';
                $mail->Body    = "<h3>Congratulations, $student_name!</h3>
                                 <p>Your application for admission into <b>$student_course</b> has been evaluated and approved successfully.</p>
                                 <p>We have attached your official <b>Provisional Allotment Letter</b> directly to this message. Please open the attached PDF document to view your payment processing QR code and complete your registration checkout.</p>
                                 <p>Best Regards,<br>Admission Committee, GPP</p>";

                $mail->send();

                if (file_exists($temp_pdf_path)) {
                    unlink($temp_pdf_path);
                }

                header("Location: manage_applications.php?email_status=accepted&name=" . urlencode($student_name));
                exit;

            } elseif ($action === 'reject') {
                mysqli_query($conn, "UPDATE applications SET status = 'Rejected' WHERE id = $app_id");
                logAdminAction($conn, 'Status Change', "Rejected student application ID: $app_id");

                $mail->Subject = 'Admission Application Status Update - GPP';
                $mail->Body    = "<h3>Hello $student_name,</h3>
                                 <p>Thank you for your interest in the diploma engineering program at Government Polytechnic, Porbandar.</p>
                                 <p>We regret to inform you that your application for admission into <b>$student_course</b> has been declined at this time due to high competition or mismatched entry metrics.</p>
                                 <p>Your documentation papers have been released back to your application profile dashboard dataset. We wish you the best of luck in your upcoming academic pursuits.</p>
                                 <p>Sincerely,<br>Admission Review Board, GPP</p>";

                $mail->send();
                header("Location: manage_applications.php?email_status=rejected&name=" . urlencode($student_name));
                exit;
            }

        } catch (Exception $e) {
            die("Application status updated, but Email Delivery Failed. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}

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
    <link href="../assets/css/design-system.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Inter', sans-serif; }
        .admin-sidebar { width: 280px; height: 100vh; position: fixed; background: linear-gradient(180deg, #0f172a, #1e293b); border-right: 1px solid var(--border); top: 0; left: 0; z-index: 1000; }
        .main-content { margin-left: 280px; padding: 30px; min-height: 100vh; }
        .admin-sidebar .nav-link { color: #94a3b8 !important; padding: 14px 24px !important; border-left: 3px solid transparent; transition: all 0.3s ease; display: flex; align-items: center; }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active { color: white !important; background: rgba(6,182,212,0.1); border-left-color: var(--secondary); }
        .stat-card-admin { background: white; border-radius: 12px; padding: 24px; border: 1px solid var(--border); box-shadow: var(--shadow); transition: var(--transition); }
        [data-theme="dark"] .stat-card-admin { background: var(--card-bg); }
        .table-modern { background: var(--card-bg); border-radius: 12px; overflow: hidden; border: 1px solid var(--border); }
        .table-modern th { background: linear-gradient(135deg, #f8fafc, #f1f5f9); padding: 16px; font-weight: 600; color: var(--text); }
        [data-theme="dark"] .table-modern th { background: linear-gradient(135deg, #1e293b, #0f172a); }
        .table-modern td { padding: 16px; vertical-align: middle; color: var(--text); border-color: var(--border); }
    </style>
</head>
<body>

    <div class="admin-sidebar">
        <div class="p-4 border-bottom" style="border-color: rgba(255,255,255,0.1) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--secondary), #0891b2);">
                    <i class="fas fa-shield-alt text-white"></i>
                </div>
                <div>
                    <h5 class="text-white mb-0 fw-bold">Admin Portal</h5>
                    <small style="color: #94a3b8;">GPP Management</small>
                </div>
            </div>
        </div>
        <a href="../index.php" class="nav-link text-primary fw-bold border-bottom" style="border-color: rgba(255,255,255,0.1) !important;"><i class="fas fa-external-link-alt me-2"></i>Go to Public Site</a>
        <a href="admin.php?page=dashboard" class="nav-link mt-2"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a href="manage_applications.php" class="nav-link active bg-light text-primary fw-bold"><i class="fas fa-file-signature me-2"></i>Applications Portal</a>
        <a href="admin.php?logout=true" class="nav-link text-danger mt-5"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>

    <div class="main-content">

        <?php if (isset($_GET['email_status'])): ?>
            <div class="alert alert-info alert-dismissible fade show shadow-sm border-0 mb-4" role="alert" style="background: rgba(6,182,212,0.1); border: 1px solid rgba(6,182,212,0.3) !important; color: var(--secondary);">
                <div class="d-flex align-items-center">
                    <i class="fas fa-paper-plane fa-2x me-3"></i>
                    <div>
                        <h6 class="mb-0 fw-bold">Automated Email System Triggered!</h6>
                        <small>Student <b><?php echo htmlspecialchars($_GET['name']); ?></b> status has been altered. An automated notification email <?php echo ($_GET['email_status'] === 'accepted') ? 'including their official FPDF Allotment letter attachment' : ''; ?> has been routed directly to their inbox address!</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1" style="color: var(--text);">Student Admission Desk</h3>
                <p class="text-muted small mb-0">Evaluate student applications and update status configurations.</p>
            </div>
            <a href="export_excel.php" class="btn-primary-custom"><i class="fas fa-file-excel me-2"></i>Export to Excel</a>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="stat-card-admin">
                    <small class="text-uppercase text-muted fw-bold">Total Requests</small>
                    <h2 class="mb-0 fw-bold" style="color: var(--secondary);"><?php echo $totalApps; ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card-admin">
                    <small class="text-uppercase text-muted fw-bold">Pending Evaluation</small>
                    <h2 class="mb-0 fw-bold" style="color: var(--accent);"><?php echo $pendingApps; ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card-admin">
                    <small class="text-uppercase text-muted fw-bold">Approved Admissions</small>
                    <h2 class="mb-0 fw-bold" style="color: #10b981;"><?php echo $acceptedApps; ?></h2>
                </div>
            </div>
        </div>

        <div class="table-modern">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Student Identity & Contacts</th>
                            <th>Target Branch</th>
                            <th>Mark Sheets</th>
                            <th>Status</th>
                            <th>Fee Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = mysqli_query($conn, "SELECT * FROM applications ORDER BY id DESC");
                        if (mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_assoc($res)) {
                                if ($row['status'] === 'Pending') {
                                    $statusMarkup = '<span class="badge" style="background: var(--accent); color: #0f172a;">Pending</span>';
                                } elseif ($row['status'] === 'Accepted') {
                                    $statusMarkup = '<span class="badge mb-1 d-block" style="background: #10b981; color: white;">Accepted</span>';
                                    $statusMarkup .= "<a href='generate_allotment.php?id={$row['id']}' target='_blank' class='btn btn-sm' style='background: rgba(239,68,68,0.1); color: #ef4444; font-size: 0.75rem;'><i class='fas fa-file-pdf me-1'></i>Letter</a>";
                                } else {
                                    $statusMarkup = '<span class="badge" style="background: #ef4444; color: white;">Rejected</span>';
                                }

                                $feeBadge = $row['fee_status'] === 'Paid' ? '<span class="badge" style="background: #10b981; color: white;"><i class="fas fa-check me-1"></i>Paid</span>' : '<span class="badge bg-secondary">Unpaid</span>';

                                echo "<tr>
                                    <td class='ps-4'>
                                        <h6 class='mb-0 fw-bold' style='color: var(--text);'>".htmlspecialchars($row['full_name'])."</h6>
                                        <small class='text-muted d-block'><i class='fas fa-envelope me-1'></i>".htmlspecialchars($row['email'])."</small>
                                    </td>
                                    <td><span class='fw-semibold' style='color: var(--secondary);'>{$row['course']}</span></td>
                                    <td><a href='../{$row['document_path']}' target='_blank' class='btn btn-sm' style='background: rgba(6,182,212,0.1); color: var(--secondary);'><i class='fas fa-file-pdf me-1'></i>View</a></td>
                                    <td>{$statusMarkup}</td>
                                    <td>{$feeBadge}</td>
                                    <td class='text-center'>
                                        <div class='btn-group' role='group'>
                                            <a href='manage_applications.php?action=accept&app_id={$row['id']}' class='btn btn-sm ".($row['status'] !== 'Pending' ? 'disabled' : '')."' style='background: #10b981; color: white;'><i class='fas fa-user-check me-1'></i>Accept</a>
                                            <a href='manage_applications.php?action=reject&app_id={$row['id']}' class='btn btn-sm ".($row['status'] !== 'Pending' ? 'disabled' : '')."' style='background: #ef4444; color: white;'><i class='fas fa-user-times me-1'></i>Reject</a>
                                        </div>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-5 text-muted'><i class='fas fa-folder-open fa-2x d-block mb-2'></i>No applications logged yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/dark-mode.js"></script>
</body>
</html>