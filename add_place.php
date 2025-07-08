<?php
include 'db.php';  // Ensure this file exists in the same directory

$error_message = "";  // Define error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $state_id = $_POST['state_id'];
    $category_id = $_POST['category_id'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $staying_options = mysqli_real_escape_string($conn, $_POST['staying_options']);
    $website_link = mysqli_real_escape_string($conn, $_POST['website_link']);
    $nearby_places = mysqli_real_escape_string($conn, $_POST['nearby_places']);
    $hotels = mysqli_real_escape_string($conn, $_POST['hotels']);
    $transport_options = mysqli_real_escape_string($conn, $_POST['transport_options']);

    // Image Upload Handling
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_folder = "uploads/" . basename($image);
    $image_ext = strtolower(pathinfo($image_folder, PATHINFO_EXTENSION));

    // Allowed image formats
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif','webp'];

    if (!in_array($image_ext, $allowed_ext)) {
        $error_message = "Only JPG, JPEG, PNG & GIF files are allowed!";
    } elseif ($_FILES['image']['size'] > 2 * 1024 * 1024) { // 2MB size limit
        $error_message = "File size must be less than 2MB!";
    } elseif (move_uploaded_file($image_tmp, $image_folder)) {
        // Secure SQL Query using Prepared Statements
        $query = "INSERT INTO places (name, state_id, category_id, description, image, location, staying_options, website_link, nearby_places, hotels, transport_options) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "siissssssss", $name, $state_id, $category_id, $description, $image, $location, $staying_options, $website_link, $nearby_places, $hotels, $transport_options);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error_message = "Database error: " . mysqli_error($conn);
        }
    } else {
        $error_message = "Failed to upload image!";
    }
}

// Fetch states and categories for dropdowns
$states_query = "SELECT id, name FROM states";
$states_result = mysqli_query($conn, $states_query);

$categories_query = "SELECT id, name FROM categories";
$categories_result = mysqli_query($conn, $categories_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Place</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: #1a1a2e;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            margin-top: 50px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            transform: scale(1.05);
        }

        input, textarea, select {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Add New Place</h2>
    <?php if (!empty($error_message)) { ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
    <?php } ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>

        <label>State:</label>
        <select name="state_id" class="form-control" required>
            <option value="">Select State</option>
            <?php while ($row = mysqli_fetch_assoc($states_result)) { ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
            <?php } ?>
        </select>

        <label>Category:</label>
        <select name="category_id" class="form-control" required>
            <option value="">Select Category</option>
            <?php while ($row = mysqli_fetch_assoc($categories_result)) { ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
            <?php } ?>
        </select>

        <label>Description:</label>
        <textarea name="description" class="form-control" required></textarea>

        <label>Image:</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>

        <label>Location:</label>
        <input type="text" name="location" class="form-control" required>

        <label>Staying Options:</label>
        <input type="text" name="staying_options" class="form-control">

        <label>Website Link:</label>
        <input type="url" name="website_link" class="form-control">

        <label>Nearby Places:</label>
        <input type="text" name="nearby_places" class="form-control">

        <label>Hotels:</label>
        <input type="text" name="hotels" class="form-control">

        <label>Transport Options:</label>
        <input type="text" name="transport_options" class="form-control">

        <button type="submit" class="btn btn-primary w-100 mt-3">Add Place</button>
<a href="admin_dashboard.php" class="btn btn-secondary w-100 mt-2">Back to Admin Dashboard</a>

    </form>
</div>
</body>
</html>
