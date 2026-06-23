<?php
ob_start();
session_start();


if (!isset($_SESSION['admin_logged_in'])) {
    die("Unauthorized access to data stream.");
}


require_once '../config/db_connect.php';


$filename = "Admission_Records_" . date('Y-m-d') . ".xls";


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");


echo "ID\tApplicant Name\tEmail Address\tPhone Number\tSelected Course\tApplication Status\tFee Status\tSubmission Date\n";


$query = mysqli_query($conn, "SELECT id, full_name, email, phone, course, status, fee_status, submitted_at FROM applications ORDER BY id ASC");


if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        
        $id         = $row['id'];
        $name       = str_replace("\t", " ", $row['full_name']);
        $email      = str_replace("\t", " ", $row['email']);
        $phone      = str_replace("\t", " ", $row['phone']);
        $course     = str_replace("\t", " ", $row['course']);
        $status     = str_replace("\t", " ", $row['status']);
        $fee_status = str_replace("\t", " ", $row['fee_status']);
        $date       = $row['submitted_at'];
        
      
        echo "$id\t$name\t$email\t$phone\t$course\t$status\t$fee_status\t$date\n";
    }
}


ob_end_flush();
mysqli_close($conn);
exit;
?>