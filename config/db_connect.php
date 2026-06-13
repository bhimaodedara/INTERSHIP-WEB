<?php
// Database credentials for XAMPP
$host = "localhost";
$username = "root";      // Default XAMPP username is 'root'
$password = "";          // Default XAMPP password is empty
$database = "gpp";

try {
    
    $conn = mysqli_connect($host, $username, $password, $database);
    
   
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    
} catch (Exception $e) {
    
    die("<div style='color: red; text-align: center; padding: 20px; font-family: sans-serif;'>
            <h3>Database Error</h3>
            <p>We are currently experiencing technical difficulties. Please check back later.</p>
            <small>" . $e->getMessage() . "</small>
         </div>");
}
?>