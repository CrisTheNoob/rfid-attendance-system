<?php
require_once '../controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new AuthController();
    $auth->signup($_POST['username'], $_POST['email'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - SLTCFPDI Attendance System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #87CEEB 0%, #4682B4 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            margin-top: 5%;
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #4682B4;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #87CEEB;
            border-color: #87CEEB;
            color: #ffffff;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #4682B4;
            transform: scale(1.05);
        }
        a {
            color: #4682B4;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container col-md-6 col-lg-4">
        <h1>Sign Up</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Choose a username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password"  class="form-control" id="password" placeholder="Create a password" required>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" placeholder="Re-enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
        <p class="mt-3 text-center">
            Already have an account? <a href="signin.php">Sign In</a>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

