<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bharath Darsika - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #FFDEE9 0%, #B5FFFC 100%);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        .register-container h2 {
            margin-bottom: 20px;
            color: #28a745;
        }
        .btn-custom {
            background-color: #28a745;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Create an Account</h2>
    <p>Join Bharath Darsika and start exploring!</p>

    <form action="register_action.php" method="POST">
        <div class="mb-3 text-start">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Choose a username" required>
        </div>
        <div class="mb-3 text-start">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Create a password" required>
        </div>
        <button type="submit" class="btn btn-custom w-100">Register</button>
    </form>

    <div class="mt-3">
        <a href="login.php" class="text-decoration-none">Already have an account? Login</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
