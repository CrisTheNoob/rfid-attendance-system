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
        .table-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-select {
            border-radius: 5px;
        }
        .filter-container {
            margin-bottom: 20px;
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
                <h1 class="mb-4">Students</h1>

                <!-- Filter Section -->
                <div class="filter-container">
                    <label for="courseFilter" class="form-label">Filter by Course:</label>
                    <select class="form-select" id="courseFilter" onchange="filterByCourse()">
                        <option value="ALL">All Courses</option>
                        <option value="CS">Computer Science</option>
                        <option value="IT">Information Technology</option>
                        <option value="ENG">Engineering</option>
                        <option value="BUS">Business</option>
                    </select>
                </div>

                <!-- Table Section -->
                <div class="table-container">
                    <table class="table table-striped" id="studentTable">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Fullname</th>
                                <th scope="col">Course</th>
                                <th scope="col">Date and Time</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr data-course="CS">
                                <td>John Doe</td>
                                <td>Computer Science</td>
                                <td>2024-12-24 14:30:00</td>
                                <td>Present</td>
                            </tr>
                            <tr data-course="IT">
                                <td>Jane Smith</td>
                                <td>Information Technology</td>
                                <td>2024-12-24 14:45:00</td>
                                <td>Absent</td>
                            </tr>
                            <tr data-course="ENG">
                                <td>Tom Wilson</td>
                                <td>Engineering</td>
                                <td>2024-12-24 15:00:00</td>
                                <td>Present</td>
                            </tr>
                            <tr data-course="BUS">
                                <td>Mary Johnson</td>
                                <td>Business</td>
                                <td>2024-12-24 15:15:00</td>
                                <td>Absent</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="layouts/resources/js/students_script.js"></script>
</body>
</html>
