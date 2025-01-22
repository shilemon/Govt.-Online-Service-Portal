<?php
// Database connection variables
$host = 'localhost'; // Hostname
$username = 'root';  // Database username
$password = '';      // Database password (leave blank for XAMPP/MAMP default)
$dbname = 'app_users'; // Database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
