<?php
include 'db.php';  // Ensure this file exists and is correctly configured

if (!$conn) {
    die("Error: Database connection failed!");
}

// Check if ID is set and valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Place ID");
}

$id = intval($_GET['id']);  // Convert to integer for security

// Check if the place exists before deleting
$check_query = "SELECT image FROM places WHERE id = ?";
$stmt = mysqli_prepare($conn, $check_query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $image_path = "uploads/" . $row['image']; // Get image file path

    // Delete record
    $delete_query = "DELETE FROM places WHERE id = ?";
    $stmt = mysqli_prepare($conn, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
        // Delete image if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        header("Location: admin_dashboard.php?msg=Place Deleted Successfully");
        exit();
    } else {
        echo "Error deleting place: " . mysqli_error($conn);
    }
} else {
    die("Place not found!");
}

mysqli_close($conn);
?>
