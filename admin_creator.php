<?php
include 'db.php';

$username = "sai"; // Change as needed
$password = "admin@123"; // Change as needed

// Hash the password securely
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the admin user
$query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

if (mysqli_query($conn, $query)) {
    echo "Admin user created successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
