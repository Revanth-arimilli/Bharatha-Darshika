<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Fetch places with category, state names, and state images based on search
$query = "SELECT places.id, places.name, categories.name AS category_name, states.name AS state_name, states.image AS state_image 
          FROM places 
          JOIN categories ON places.category_id = categories.id
          JOIN states ON places.state_id = states.id
          WHERE places.name LIKE '%$search%' 
          OR categories.name LIKE '%$search%' 
          OR states.name LIKE '%$search%'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Bharath Darsika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* 🔥 Cool Dark Theme with Neon Glow */
        body {
            background: #1a1a2e;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        /* 🚀 Sidebar Navigation */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            padding: 20px;
            transition: 0.3s;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
            padding-left: 20px;
        }

        /* 🎭 Main Content */
        .main-content {
            margin-left: 270px;
            padding: 20px;
        }

        /* 🎆 Table Styling */
        .table-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
        }

        .table thead {
            background: #16213e;
        }

        .table tbody tr:hover {
            background: rgba(0, 255, 255, 0.1);
            transition: 0.3s;
        }

        /* 🎯 Buttons */
        .btn-primary {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            transform: scale(1.05);
        }

        .btn-warning, .btn-danger {
            transition: 0.3s;
        }

        .btn-warning:hover, .btn-danger:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3 class="text-center">Admin Panel</h3>
    <a href="admin_dashboard.php">🏠 Dashboard</a>
    <a href="add_place.php">➕ Add Place</a>
    <a href="add_state.php">➕ Add State</a>
    <a href="admin_logout.php">🚪 Logout</a>
</div>

<div class="main-content">
    <h2 class="text-center mb-4">Manage Places & States</h2>

    <div class="d-flex justify-content-between">
        <a href="add_place.php" class="btn btn-primary">Add New Place</a>
        <a href="add_state.php" class="btn btn-success">Add New State</a>
    </div>

    <!-- 🔍 Search Bar -->
    <div class="mt-3">
        <form method="GET" action="" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search Places, Categories, or States" value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-info">Search</button>
        </form>
    </div>

    <div class="table-container mt-4">
        <table class="table table-bordered text-white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>State</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['category_name']) ?></td>
                        <td><?= htmlspecialchars($row['state_name']) ?></td>
                        <td>
                            <?php if (!empty($row['state_image'])) { ?>
                                <img src="uploads/<?= $row['state_image'] ?>" alt="State Image" class="state-image" width="60" height="40">
                            <?php } else { ?>
                                <span>No Image</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="edit_place.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_place.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this place?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
