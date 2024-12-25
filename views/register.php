<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SLTCFPDI Attendance System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php include 'layouts/resources/css/dashboard.php'; ?>
    <style>
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Toggle Button for Small Screens -->
            <button class="sidebar-collapse d-md-none" onclick="toggleSidebar()">☰ Menu</button>

            <!-- Sidebar -->
            <?php include 'layouts/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                <h1 class="mb-4">Register</h1>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">Registration successful!</div>
                <?php endif; ?>

                <div class="form-container">
                    <form action="../controllers/RegistrationController.php" method="POST">
                        <div class="mb-3">
                            <label for="uidNumber" class="form-label">UID Number</label>
                            <input type="text" class="form-control" id="uidNumber" name="uid_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="middleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" name="middle_name">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactPerson" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" id="contactPerson" name="contact_person" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactPersonNumber" class="form-label">Contact Person Number</label>
                            <input type="text" class="form-control" id="contactPersonNumber" name="contact_person_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <select class="form-select" id="course" name="course" required>
                                <option value="" disabled selected>Select a Course</option>
                                <option value="CS">Computer Science</option>
                                <option value="IT">Information Technology</option>
                                <option value="ENG">Engineering</option>
                                <option value="BUS">Business</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
