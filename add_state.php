<?php
include 'db.php';  // Database connection

$error_message = "";

// Handle Image Upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $state_id = $_POST['state_id'];

    // Image Upload Handling
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Ensure upload directory exists
    $upload_dir = "uploads/states/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if not exists
    }

    $image_folder = $upload_dir . basename($image);
    $image_ext = strtolower(pathinfo($image_folder, PATHINFO_EXTENSION));

    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif','webp'];

    if (!in_array($image_ext, $allowed_ext)) {
        $error_message = "Only JPG, JPEG, PNG & GIF files are allowed!";
    } elseif ($_FILES['image']['size'] > 2 * 1024 * 1024) { // 2MB limit
        $error_message = "File size must be less than 2MB!";
    } elseif (move_uploaded_file($image_tmp, $image_folder)) {
        // Update state image in database
        $query = "UPDATE states SET image = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "si", $image, $state_id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: add_state.php"); // Refresh page after successful upload
            exit();
        } else {
            $error_message = "Database error: " . mysqli_error($conn);
        }
    } else {
        $error_message = "Failed to upload image!";
    }
}

// Fetch states for dropdown & displaying images
$states_query = "SELECT * FROM states";
$states_result = mysqli_query($conn, $states_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage State Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #1a1a2e;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 500px;
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

        .state-card {
            border-radius: 10px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
            margin-bottom: 20px;
        }

        .state-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        select, input {
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
    <h2 class="text-center">Upload State Image</h2>
    <?php if (!empty($error_message)) { ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
    <?php } ?>
    <form method="POST" enctype="multipart/form-data">
        <label>Select State:</label>
        <select name="state_id" class="form-control" required>
            <option value="">Select State</option>
            <?php while ($row = mysqli_fetch_assoc($states_result)) { ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
            <?php } ?>
        </select>

        <label>Upload Image:</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>

        <button type="submit" class="btn btn-primary w-100 mt-3">Upload</button>
    </form>
</div>

<div class="container mt-5">
<div class="text-center mb-3">
    <a href="admin_dashboard.php" class="btn btn-secondary">Back to Home</a>
</div>

    <h2 class="text-center">States & Images</h2>
    <div class="row">
        <?php
        mysqli_data_seek($states_result, 0); // Reset result pointer to fetch again
        while ($row = mysqli_fetch_assoc($states_result)) { ?>
            <div class="col-md-4">
                <div class="state-card">
                    <?php if (!empty($row['image'])) { ?>
                        <img src="uploads/states/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                    <?php } else { ?>
                        <div class="p-3 text-center">No Image Uploaded</div>
                    <?php } ?>
                    <div class="p-3">
                        <h5 class="text-center"><?= htmlspecialchars($row['name']) ?></h5>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
