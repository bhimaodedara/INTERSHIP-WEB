<?php

define('FPDF_FONTPATH', 'font/'); 

require('fpdf.php');
require_once '../config/db_connect.php';


include "phpqrcode/qrlib.php";

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    die("Unauthorized access.");
}

$app_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$query = mysqli_query($conn, "SELECT * FROM applications WHERE id = $app_id LIMIT 1");
$student = mysqli_fetch_assoc($query);

if (!$student) {
    die("Application record not found.");
}


$token = "GPP_APP_" . $student['id'] . "_" . strtoupper(substr($student['full_name'] ?? 'STU', 0, 3));


$qr_storage_folder = "qr_images/";
if (!is_dir($qr_storage_folder)) {
    mkdir($qr_storage_folder, 0755, true);
}
$image_path = $qr_storage_folder . $token . ".png";


$pay_endpoint_url = "http://localhost/GPP-WEB-ORGANIZED/pay_fee.php?id=" . $student['id'] . "&token=" . $token;


QRcode::png(
    $pay_endpoint_url, 
    $image_path,       
    QR_ECLEVEL_H,      
    4                  
);



$pdf = new FPDF('P', 'mm', 'A3');
$pdf->AddPage();


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


$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 10, 'OFFICIAL PROVISIONAL SELECTION LETTER', 0, 1, 'C');
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 5, 'Ref No: GPP/ADM/2026/' . $student['id'], 0, 0, 'L');
$pdf->Cell(0, 5, 'Date: ' . date('d-M-Y'), 0, 1, 'R');
$pdf->Ln(6);


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, 'Dear ' . strtoupper($student['full_name']) . ',', 0, 1, 'L');
$pdf->Ln(3);


$pdf->SetFont('Arial', '', 11);
$msg = "We are pleased to inform you that your application has been evaluated and successfully APPROVED for admission into the regular diploma program stream detailed below:";
$pdf->MultiCell(0, 6, $msg, 0, 'L');
$pdf->Ln(6);


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


$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, 'Next Steps for Enrollment Confirmation:', 0, 1, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Ln(2);

$instruction = "To secure your seat permanently, you are required to complete the payment of the provisional academic fee subscription. Below, your unique mobile transaction QR code has been compiled securely linked to our payment processor endpoint. Please scan the QR code to finish your checkout safely via Razorpay.";
$pdf->MultiCell(0, 5, $instruction, 0, 'L');
$pdf->Ln(5);


if (file_exists($image_path)) {
    $pdf->Image($image_path, 12, 142, 38, 38);
}


$pdf->SetY(150);


$pdf->Cell(100); 
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 5, 'Authorized Signatory', 0, 1, 'C');
$pdf->Cell(100);
$pdf->Cell(0, 5, 'Admission Committee Cell, GPP', 0, 1, 'C');


$pdf->Output('Allotment_Letter_' . $student['id'] . '.pdf', 'I');
?>