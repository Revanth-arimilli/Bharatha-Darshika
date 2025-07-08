<?php
session_start();
include 'db.php';

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "Both fields are required!";
    } else {
        $query = "SELECT * FROM admin WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $admin = mysqli_fetch_assoc($result);

            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['admin'] = true;
                $_SESSION['username'] = $admin['username'];
                header("Location: admin_dashboard.php");
                exit();
            } else {
                $error_message = "Invalid Username or Password!";
            }
        } else {
            $error_message = "Database query failed: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Bharath Darsika</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* 🌌 Cool Neon Gradient Background */
        body {
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        /* 🎨 Login Container */
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
            text-align: center;
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeIn 1.5s ease-in-out;
        }

        /* 🚀 Animated Welcome Message */
        .welcome-text {
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            background: linear-gradient(45deg, cyan, #ff00ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: glow 1.5s infinite alternate;
        }

        /* 🔥 Input Fields */
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* 🎭 Neon Glowing Button */
        .btn-primary {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            border: none;
            padding: 10px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.7);
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.9);
        }

        /* 🎆 Animated Background Lights */
        .glow {
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 0, 255, 0.3);
            filter: blur(100px);
            animation: moveGlow 6s infinite alternate;
        }

        .glow2 {
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(0, 255, 255, 0.3);
            filter: blur(100px);
            animation: moveGlow2 6s infinite alternate;
        }

        /* 🎬 Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 10px cyan;
            }
            to {
                text-shadow: 0 0 20px cyan, 0 0 30px #ff00ff;
            }
        }

        @keyframes moveGlow {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(50px);
            }
        }

        @keyframes moveGlow2 {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-50px);
            }
        }

    </style>
</head>
<body>
    <div class="glow"></div>
    <div class="glow2"></div>

    <div class="login-container">
        <h2 class="welcome-text">Welcome to Bharath Darsika Admin</h2>
        <?php if (!empty($error_message)) { ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
