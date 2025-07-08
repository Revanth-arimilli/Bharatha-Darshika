<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "tourism"; // Change to your actual database name

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
