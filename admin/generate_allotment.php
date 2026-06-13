<?php
// Define font path properties to eliminate stream errors cleanly
define('FPDF_FONTPATH', 'font/'); 

require('fpdf.php');
require_once '../config/db_connect.php';

// Include the standard faculty QR code library engine
include "phpqrcode/qrlib.php";

session_start();
// Security Check: Only allow authenticated admins to view or trigger this file
if (!isset($_SESSION['admin_logged_in'])) {
    die("Unauthorized access.");
}

$app_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query the selected student profile
$query = mysqli_query($conn, "SELECT * FROM applications WHERE id = $app_id LIMIT 1");
$student = mysqli_fetch_assoc($query);

if (!$student) {
    die("Application record not found.");
}

/* ==========================================================
   CONCEPT 05 INTEGRATION: DYNAMIC PAYMENT QR GENERATION ENGINE
   ========================================================== */
// Generate a unique token reference using the student ID number
$token = "GPP_APP_" . $student['id'] . "_" . strtoupper(substr($student['full_name'] ?? 'STU', 0, 3));

// Create a directory path for the dynamic PNG file
$qr_storage_folder = "qr_images/";
if (!is_dir($qr_storage_folder)) {
    mkdir($qr_storage_folder, 0755, true);
}
$image_path = $qr_storage_folder . $token . ".png";

// Design the checkout URL matching your master workflow plan (Points to Phase 4)
$pay_endpoint_url = "http://localhost/GPP-WEB-ORGANIZED/pay_fee.php?id=" . $student['id'] . "&token=" . $token;

// Generate the QR file using the faculty script parameters
QRcode::png(
    $pay_endpoint_url, // Text metadata context string
    $image_path,       // Hard drive output destination layout string
    QR_ECLEVEL_H,      // High precision error correction setting
    4                  // Component module dot resolution size matrix
);


// ==========================================================
// INITIALIZE FPDF LAYOUT COMPILATION
// ==========================================================
$pdf = new FPDF('P', 'mm', 'A3');
$pdf->AddPage();

// --- DESIGN INSTITUTION HEADER ---
if (file_exists('../assets/images/main logo.jpeg')) {
    $pdf->Image('../assets/images/main logo.jpeg', 12, 10, 22, 22);
}

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30); 
$pdf->Cell(0, 6, 'COMPUTER ENGINEERING DEPARTMENT', 0, 1, 'L');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30);
$pdf->Cell(0, 4, 'Government Polytechnic, Porbandar, Gujarat', 0, 1, 'L');
$pdf->Cell(30);
$pdf->Cell(0, 4, 'Contact: +91 9033392721 | Email: info@gpp.edu.in', 0, 1, 'L');

$pdf->Ln(12); 
$pdf->Line(10, 36, 200, 36); 

// --- TITLE BLOCK ---
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 10, 'OFFICIAL PROVISIONAL SELECTION LETTER', 0, 1, 'C');
$pdf->Ln(4);

// --- METADATA METRICS ---
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 5, 'Ref No: GPP/ADM/2026/' . $student['id'], 0, 0, 'L');
$pdf->Cell(0, 5, 'Date: ' . date('d-M-Y'), 0, 1, 'R');
$pdf->Ln(6);

// --- SALUTATION ---
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, 'Dear ' . strtoupper($student['full_name']) . ',', 0, 1, 'L');
$pdf->Ln(3);

// --- CONTENT PARAGRAPH ---
$pdf->SetFont('Arial', '', 11);
$msg = "We are pleased to inform you that your application has been evaluated and successfully APPROVED for admission into the regular diploma program stream detailed below:";
$pdf->MultiCell(0, 6, $msg, 0, 'L');
$pdf->Ln(6);

// --- ALLOTMENT INFRASTRUCTURE GRID ---
$pdf->SetFillColor(245, 245, 245); 
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 8, ' Allotted Course:', 1, 0, 'L', true);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 8, ' ' . $student['course'], 1, 1, 'L');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 8, ' Registered Email:', 1, 0, 'L', true);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 8, ' ' . $student['email'], 1, 1, 'L');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(50, 8, ' Registered Mobile:', 1, 0, 'L', true);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 8, ' ' . $student['phone'], 1, 1, 'L');

$pdf->Ln(8);

// --- FEE INSTRUCTIONS & QR INTENT ---
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, 'Next Steps for Enrollment Confirmation:', 0, 1, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Ln(2);

$instruction = "To secure your seat permanently, you are required to complete the payment of the provisional academic fee subscription. Below, your unique mobile transaction QR code has been compiled securely linked to our payment processor endpoint. Please scan the QR code to finish your checkout safely via Razorpay.";
$pdf->MultiCell(0, 5, $instruction, 0, 'L');
$pdf->Ln(5);

// --- PRINTING THE LIVE BARCODE ACCORDING TO USER FLOW ---
// Prints your freshly generated QR code picture cleanly on the page layout
if (file_exists($image_path)) {
    $pdf->Image($image_path, 12, 142, 38, 38);
}

// Move spacing coordinates down to prevent drawing signatures over the barcode image block
$pdf->SetY(150);

// --- SIGNATURE PANEL ---
$pdf->Cell(100); 
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 5, 'Authorized Signatory', 0, 1, 'C');
$pdf->Cell(100);
$pdf->Cell(0, 5, 'Admission Committee Cell, GPP', 0, 1, 'C');

// Output PDF inline directly inside web view tab window
$pdf->Output('Allotment_Letter_' . $student['id'] . '.pdf', 'I');
?>