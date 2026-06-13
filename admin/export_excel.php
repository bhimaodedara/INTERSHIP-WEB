<?php
ob_start();
session_start();

// 1. Security Gatekeeper: Ensure only authenticated administrators can run this data dump
if (!isset($_SESSION['admin_logged_in'])) {
    die("Unauthorized access to data stream.");
}

// 2. Connect to your live database setup
require_once '../config/db_connect.php';

// 3. Set the download filename with today's date stamp
$filename = "Admission_Records_" . date('Y-m-d') . ".xls";

/* =========================================================================
   NATIVE NUCLEUS EXCEL DOWNSTREAM STREAMING (NO COMPOSER DEPENDENCIES REQUIRED)
   ========================================================================= */
// Force the browser to read this output as a real downloadable Microsoft Excel document
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

// 4. Create the Column Header Headers Row (separated by Tabs \t)
echo "ID\tApplicant Name\tEmail Address\tPhone Number\tSelected Course\tApplication Status\tFee Status\tSubmission Date\n";

// 5. Fetch your live student applications dataset safely from MySQL
$query = mysqli_query($conn, "SELECT id, full_name, email, phone, course, status, fee_status, submitted_at FROM applications ORDER BY id ASC");

// 6. Loop through each row and output it cleanly into the spreadsheet data stream
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        // Clean up text characters to prevent any string breaking within columns
        $id         = $row['id'];
        $name       = str_replace("\t", " ", $row['full_name']);
        $email      = str_replace("\t", " ", $row['email']);
        $phone      = str_replace("\t", " ", $row['phone']);
        $course     = str_replace("\t", " ", $row['course']);
        $status     = str_replace("\t", " ", $row['status']);
        $fee_status = str_replace("\t", " ", $row['fee_status']);
        $date       = $row['submitted_at'];
        
        // Print the row fields separated by tabs, ending with a new line breaks command
        echo "$id\t$name\t$email\t$phone\t$course\t$status\t$fee_status\t$date\n";
    }
}

// Clear the tracking buffers and shut down the data thread smoothly
ob_end_flush();
mysqli_close($conn);
exit;
?>