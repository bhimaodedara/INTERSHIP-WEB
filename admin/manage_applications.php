<?php
session_start();
require_once '../config/db_connect.php';

// Include the PHPMailer classes from the shared vendor folder
require_once '../vendor/autoload.php';
require_once '../vendor/PHPMailer/src/Exception.php';
require_once '../vendor/PHPMailer/src/PHPMailer.php';
require_once '../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

/* =========================================================================
   ACTION HANDLER: CURATE APPLICATION STATUS WITH AUTOMATED EMAIL
========================================================================= */
if (isset($_GET['action']) && isset($_GET['app_id'])) {
    $app_id = (int)$_GET['app_id'];
    $action = $_GET['action'];
    
    // Fetch student data before updating so we have their email and name ready
    $student_query = mysqli_query($conn, "SELECT * FROM applications WHERE id = $app_id LIMIT 1");
    $student = mysqli_fetch_assoc($student_query);
    
    if ($student) {
        $student_email = $student['email'];
        $student_name = $student['full_name'];
        $student_course = $student['course'];
        
        // Initialize PHPMailer object
        $mail = new PHPMailer(true);
        
        try {
            // --- SERVER SMTP CONFIGURATION ---
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
                // 1. Update status in database
                mysqli_query($conn, "UPDATE applications SET status = 'Accepted' WHERE id = $app_id");
                logAdminAction($conn, 'Status Change', "Accepted student application ID: $app_id");
                
                // 2. FORCE SYSTEM BASE PATH ALIGNMENT FOR FPDF CORE
                // Tell FPDF to look exactly inside the local admin/font/ folder
                if(!defined('FPDF_FONTPATH')) {
                    define('FPDF_FONTPATH', __DIR__ . '/font/'); 
                }
                
                require_once 'fpdf.php';
                include_once "phpqrcode/qrlib.php";
                
                // Build token & QR code for attachment letter
                $token = "GPP_APP_" . $student['id'] . "_" . strtoupper(substr($student['full_name'] ?? 'STU', 0, 3));
                $qr_storage_folder = "qr_images/";
                if (!is_dir($qr_storage_folder)) { mkdir($qr_storage_folder, 0755, true); }
                $image_path = $qr_storage_folder . $token . ".png";
                $pay_endpoint_url = "http://localhost/GPP-WEB-ORGANIZED/pay_fee.php?id=" . $student['id'] . "&token=" . $token;
                QRcode::png($pay_endpoint_url, $image_path, QR_ECLEVEL_H, 4);
                
                // Compile dynamic template inside FPDF memory stream object
                // We use standard 'Courier' as it is hardcoded natively into the FPDF core engine and never requires external folder reads!
                // Initialize clean FPDF layout
                $pdf = new FPDF('P', 'mm', array(210, 297));
                $pdf->AddPage();
                
                // --- HEADER BRANDING SECTION ---
                if (file_exists('../assets/images/main logo.jpeg')) { 
                    // Placed at X=12, Y=10 with a width of 24
                    $pdf->Image('../assets/images/main logo.jpeg', 12, 10, 24, 24); 
                }
                
                // Move cursor to the right of the logo image before typing text
                $pdf->SetXY(40, 13); 
                $pdf->SetFont('Arial', 'B', 14); 
                // The '1' at the end of the cell forces the NEXT element to go to a new line
                $pdf->Cell(0, 6, 'COMPUTER ENGINEERING DEPARTMENT', 0, 1, 'L');
                
                $pdf->SetX(40); // Keep text aligned to the right of the logo
                $pdf->SetFont('Arial', '', 10); 
                $pdf->Cell(0, 5, 'Government Polytechnic, Porbandar, Gujarat', 0, 1, 'L');
                
                // Add vertical breathing room and draw the horizontal separator line
                $pdf->Ln(4);                          // reduced from 10
$pdf->Line(10, 38, 200, 38);
$pdf->Ln(3);                          // reduced from 5

// --- DOCUMENT TITLE ---
$pdf->SetFont('Helvetica', 'B', 12); 
$pdf->Cell(0, 8, 'OFFICIAL PROVISIONAL SELECTION LETTER', 0, 1, 'C');  // reduced from 10
$pdf->Ln(3);                          // reduced from 5

// --- APPLICANT SALUTATION ---
$pdf->SetFont('Helvetica', '', 11); 
$pdf->Cell(0, 5, 'Dear ' . strtoupper($student_name) . ',', 0, 1, 'L'); 
$pdf->Ln(3);                          // reduced from 4

// --- BODY TEXT ---
$pdf->MultiCell(0, 6, "We are pleased to inform you that your application has been evaluated and successfully APPROVED for admission into the course program detailed below:", 0, 'L'); 
$pdf->Ln(4);                          // reduced from 6

// --- ALLOTTED COURSE DISPLAY BOX ---
$pdf->SetFillColor(245, 245, 245); 
$pdf->SetFont('Helvetica', 'B', 11); 
$pdf->Cell(50, 8, ' Allotted Course:', 1, 0, 'L', true);
$pdf->SetFont('Helvetica', '', 11); 
$pdf->Cell(0, 8, ' ' . $student_course, 1, 1, 'L'); 
$pdf->Ln(5);                          // reduced from 8

// --- INSTRUCTIONS TEXT ---
$pdf->MultiCell(0, 6, "To secure your seat permanently, please scan the QR code embedded below or access your portal profile to settle the provisional tuition fee payment.", 0, 'L'); 
$pdf->Ln(6);                          // reduced from 10

// --- QR CODE ROUTING DISPLAY ---
if (file_exists($image_path)) {
    // ✅ Use GetY() so QR always appears right below content
    if ($pdf->GetY() > 240) { $pdf->AddPage(); }  // safety check
    $pdf->Image($image_path, 12, $pdf->GetY(), 40, 40);
    $pdf->Ln(45);
}
                
        

                // --- FIX: Write PDF to a temp file, attach it, then delete it ---
                // Using Output('S') with addStringAttachment causes a blank PDF in email
                // because FPDF's binary output conflicts with the 'base64' encoding flag.
                // Writing to a real file and using addAttachment() is reliable.
                // --- CRITICAL FIX: REORDER FPDF DESTINATION PARAMETERS ---
                $temp_pdf_path = tempnam(sys_get_temp_dir(), 'GPP_') . '.pdf';

                // FPDF requires the file path FIRST, then the command mode flag SECOND!
                $pdf->Output($temp_pdf_path, 'F'); 

                // Securely attach the freshly written temp file straight to PHPMailer
                $mail->addAttachment($temp_pdf_path, 'GPP_Allotment_Letter.pdf');
                // Email Text Body Content Configuration
                $mail->Subject = 'Admission Approved - Government Polytechnic Porbandar';
                $mail->Body    = "<h3>Congratulations, $student_name!</h3>
                                 <p>Your application for admission into <b>$student_course</b> has been evaluated and approved successfully.</p>
                                 <p>We have attached your official <b>Provisional Allotment Letter</b> directly to this message. Please open the attached PDF document to view your payment processing QR code and complete your registration checkout.</p>
                                 <p>Best Regards,<br>Admission Committee, GPP</p>";
                
                $mail->send();

                // Clean up the temporary PDF file after sending
                if (file_exists($temp_pdf_path)) {
                    unlink($temp_pdf_path);
                }

                header("Location: manage_applications.php?email_status=accepted&name=" . urlencode($student_name));
                exit;

            } elseif ($action === 'reject') {
                // 1. Update status in database
                mysqli_query($conn, "UPDATE applications SET status = 'Rejected' WHERE id = $app_id");
                logAdminAction($conn, 'Status Change', "Rejected student application ID: $app_id");
                
                // 2. Configure Rejection Email contents
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
        .btn-xs { padding: 1px 5px; font-size: 0.75rem; border-radius: 3px; }
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
        
        <?php if (isset($_GET['email_status'])): ?>
            <div class="alert alert-info alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-paper-plane fa-2x me-3 text-info"></i>
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
                <h3 style="color: #1a365d; font-weight: 700;">Student Admission Desk</h3>
                <p class="text-muted small mb-0">Evaluate student applications, update baseline status configurations, and export reporting tables.</p>
            </div>
            <a href="export_excel.php" class="btn btn-success shadow-sm fw-bold"><i class="fas fa-file-excel me-2"></i>Export Dataset to Excel</a>
        </div>

        <div class="row mb-4">
            <div class="col-md-4"><div class="card border-0 shadow-sm p-3 bg-white text-dark"><small class="text-uppercase text-muted fw-bold">Total Requests</small><h2 class="mb-0 fw-bold text-primary"><?php echo $totalApps; ?></h2></div></div>
            <div class="col-md-4"><div class="card border-0 shadow-sm p-3 bg-white text-dark"><small class="text-uppercase text-muted fw-bold">Pending Evaluation</small><h2 class="mb-0 fw-bold text-warning"><?php echo $pendingApps; ?></h2></div></div>
            <div class="col-md-4"><div class="card border-0 shadow-sm p-3 bg-white text-dark"><small class="text-uppercase text-muted fw-bold">Approved Admissions</small><h2 class="mb-0 fw-bold text-success"><?php echo $acceptedApps; ?></h2></div></div>
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
                                if ($row['status'] === 'Pending') {
                                    $statusMarkup = '<span class="badge bg-warning text-dark">Pending</span>';
                                } elseif ($row['status'] === 'Accepted') {
                                    $statusMarkup = '<span class="badge bg-success d-block mb-1">Accepted</span>';
                                    $statusMarkup .= "<a href='generate_allotment.php?id={$row['id']}' target='_blank' class='btn btn-outline-danger btn-xs btn-block'><i class='fas fa-file-pdf me-1'></i>Letter</a>";
                                } else {
                                    $statusMarkup = '<span class="badge bg-danger">Rejected</span>';
                                }
                                
                                $feeBadge = $row['fee_status'] === 'Paid' ? '<span class="badge bg-success"><i class="fas fa-check me-1"></i>Paid</span>' : '<span class="badge bg-secondary">Unpaid</span>';
                                
                                echo "<tr>
                                    <td class='ps-3'>
                                        <h6 class='mb-0 fw-bold text-dark'>".htmlspecialchars($row['full_name'])."</h6>
                                        <small class='text-muted d-block'><i class='fas fa-envelope me-1'></i>".htmlspecialchars($row['email'])."</small>
                                    </td>
                                    <td><span class='fw-semibold text-primary'>{$row['course']}</span></td>
                                    <td><a href='../{$row['document_path']}' target='_blank' class='btn btn-outline-primary btn-sm'><i class='fas fa-file-pdf me-1'></i>View Credentials</a></td>
                                    <td>{$statusMarkup}</td>
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
                            echo "<tr><td colspan='6' class='text-center py-5 text-muted'><i class='fas fa-folder-open fa-2x d-block mb-2'></i>No applications logged yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>