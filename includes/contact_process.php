<?php
require_once "../config/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: bcontact.php');
    exit;
}

$firstName = mysqli_real_escape_string($conn, trim($_POST['firstName']));
$lastName  = mysqli_real_escape_string($conn, trim($_POST['lastName']));
$email     = mysqli_real_escape_string($conn, trim($_POST['email']));
$phone     = mysqli_real_escape_string($conn, trim($_POST['phone']));
$subject   = mysqli_real_escape_string($conn, trim($_POST['subject']));
$message   = mysqli_real_escape_string($conn, trim($_POST['message']));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: bcontact.php?error=1&msg=' . urlencode('Invalid email format'));
    exit;
}

$sql = "INSERT INTO contact_messages (first_name, last_name, email, phone, subject, message)
        VALUES ('$firstName', '$lastName', '$email', '$phone', '$subject', '$message')";

if (mysqli_query($conn, $sql)) {
    header('Location: bcontact.php?success=1');
    exit;
} else {
    header('Location: bcontact.php?error=1&msg=' . urlencode('Database error: ' . mysqli_error($conn)));
    exit;
}
?>
