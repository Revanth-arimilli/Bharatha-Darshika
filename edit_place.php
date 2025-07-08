<?php
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Place ID");
}

$id = intval($_GET['id']);

// Fetch existing place details
$query = "SELECT * FROM places WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$place = mysqli_fetch_assoc($result);

if (!$place) {
    die("Place not found!");
}

// Fetch states and categories for dropdowns
$states_query = "SELECT id, name FROM states";
$states_result = mysqli_query($conn, $states_query);

$categories_query = "SELECT id, name FROM categories";
$categories_result = mysqli_query($conn, $categories_query);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $state_id = $_POST['state_id'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $staying_options = $_POST['staying_options'];
    $website_link = $_POST['website_link'];
    $nearby_places = $_POST['nearby_places'];
    $hotels = $_POST['hotels'];
    $transport_options = $_POST['transport_options'];

    // Handle Image Upload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_folder = "uploads/" . $image;

        move_uploaded_file($image_tmp, $image_folder);
        $image_update = ", image = ?";
    } else {
        $image_update = "";
    }

    // Update Query
    $query = "UPDATE places SET name=?, state_id=?, category_id=?, description=?, location=?, staying_options=?, website_link=?, nearby_places=?, hotels=?, transport_options=? $image_update WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    
    if (!empty($image)) {
        mysqli_stmt_bind_param($stmt, "siissssssssi", $name, $state_id, $category_id, $description, $location, $staying_options, $website_link, $nearby_places, $hotels, $transport_options, $image, $id);
    } else {
        mysqli_stmt_bind_param($stmt, "siisssssssi", $name, $state_id, $category_id, $description, $location, $staying_options, $website_link, $nearby_places, $hotels, $transport_options, $id);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: admin_dashboard.php?msg=Place Updated Successfully");
        exit();
    } else {
        echo "Error updating place: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Place</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #1a1a2e;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 700px;
            margin-top: 50px;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            transform: scale(1.05);
        }
        .img-preview {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Edit Place</h2>
    <div class="card">
        <form method="POST" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($place['name']) ?>" required>

            <label>State:</label>
            <select name="state_id" class="form-control" required>
                <?php while ($row = mysqli_fetch_assoc($states_result)) { ?>
                    <option value="<?= $row['id'] ?>" <?= ($row['id'] == $place['state_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php } ?>
            </select>

            <label>Category:</label>
            <select name="category_id" class="form-control" required>
                <?php while ($row = mysqli_fetch_assoc($categories_result)) { ?>
                    <option value="<?= $row['id'] ?>" <?= ($row['id'] == $place['category_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php } ?>
            </select>

            <label>Description:</label>
            <textarea name="description" class="form-control" required><?= htmlspecialchars($place['description']) ?></textarea>

            <label>Image (Optional - Leave empty to keep current image):</label>
            <input type="file" name="image" class="form-control" onchange="previewImage(event)">
            
            <?php if (!empty($place['image'])) { ?>
                <img src="uploads/<?= htmlspecialchars($place['image']) ?>" class="img-preview" id="imagePreview">
            <?php } else { ?>
                <img id="imagePreview" class="img-preview" style="display: none;">
            <?php } ?>

            <label>Location:</label>
            <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($place['location']) ?>" required>

            <label>Staying Options:</label>
            <input type="text" name="staying_options" class="form-control" value="<?= htmlspecialchars($place['staying_options']) ?>">

            <label>Website Link:</label>
            <input type="url" name="website_link" class="form-control" value="<?= htmlspecialchars($place['website_link']) ?>">

            <label>Nearby Places:</label>
            <input type="text" name="nearby_places" class="form-control" value="<?= htmlspecialchars($place['nearby_places']) ?>">

            <label>Hotels:</label>
            <input type="text" name="hotels" class="form-control" value="<?= htmlspecialchars($place['hotels']) ?>">

            <label>Transport Options:</label>
            <input type="text" name="transport_options" class="form-control" value="<?= htmlspecialchars($place['transport_options']) ?>">

            <button type="submit" class="btn btn-primary w-100 mt-3">Update Place</button>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let img = document.getElementById('imagePreview');
            img.src = reader.result;
            img.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</body>
</html>
