<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLTCFPDI Attendance System</title>
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
        .navbar {
            background-color: #4682B4;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            color: #ffffff;
        }
        .navbar-brand:hover {
            color: #dcdcdc;
        }
        .nav-link {
            color: #ffffff;
        }
        .nav-link:hover {
            color: #dcdcdc;
        }
        .container {
            margin-top: 10%;
        }
        h1 {
            font-size: calc(1.5rem + 2vw);
            font-weight: bold;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p {
            font-size: calc(1rem + 0.5vw);
            color: #f8f9fa;
        }
        .btn-primary {
            background-color: #87CEEB;
            border-color: #87CEEB;
            color: #ffffff;
            padding: 10px 20px;
            font-size: calc(1rem + 0.2vw);
            font-weight: bold;
            border-radius: 25px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #4682B4;
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            .container {
                margin-top: 20%;
                padding: 0 10px;
            }
        }
        @media (max-width: 576px) {
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
            .btn-primary {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">SLTCFPDI Attendance System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../views/signin.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/signup.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <h1>Welcome to SLTCFPDI Attendance System</h1>
        <p>Efficient and reliable attendance tracking for students and staff.</p>
        <a href="signin.html" class="btn btn-primary">Get Started</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
