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
        .overview-box {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .overview-box.present { border-left: 5px solid #28a745; }
        .overview-box.absent { border-left: 5px solid #dc3545; }
        .overview-box.total { border-left: 5px solid #007bff; }

        /* Preloader Styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .spinner-border {
            width: 4rem;
            height: 4rem;
            border-width: 0.4rem;
        }
    </style>
</head>
<body>
        <!-- Preloader -->
        <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Toggle Button for Small Screens -->
            <button class="sidebar-collapse d-md-none" onclick="toggleSidebar()">☰ Menu</button>

            <!-- Sidebar -->
            <?php include 'layouts/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                <h1 class="mb-4">Overview</h1>

                <!-- Boxes Section -->
                <div class="row g-4">
                    <!-- Present Students -->
                    <div class="col-md-4">
                        <div class="overview-box present">
                            <h3>Present</h3>
                            <p>0</p> <!-- Replace with dynamic data -->
                        </div>
                    </div>

                    <!-- Absent Students -->
                    <div class="col-md-4">
                        <div class="overview-box absent">
                            <h3>Absent</h3>
                            <p>0</p> <!-- Replace with dynamic data -->
                        </div>
                    </div>

                    <!-- Total Students -->
                    <div class="col-md-4">
                        <div class="overview-box total">
                            <h3>Total Students</h3>
                            <p>0</p> <!-- Replace with dynamic data -->
                        </div>
                    </div>
                </div>

                <!-- List of Registered Students -->
                <div class="mt-5">
                    <h2 class="mb-4">Registered Students</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">UID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch registered students from the database
                                require_once '../config/app.php';
                                $db = new Database();
                                $conn = $db->getConnection();
                                $query = "SELECT id, uid_number, CONCAT(first_name, ' ', last_name) AS full_name, course FROM students";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();
                                $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($students as $student): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($student['uid_number']); ?></td>
                                        <td><?= htmlspecialchars($student['full_name']); ?></td>
                                        <td><?= htmlspecialchars($student['course']); ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewStudentModal" data-id="<?= $student['id']; ?>">View Details</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- View Student Modal -->
                <div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewStudentModalLabel">Student Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Student Details Will Be Fetched Dynamically -->
                                <form id="editStudentForm" action="../controllers/EditStudentController.php" method="POST">
                                    <input type="hidden" name="id" id="studentId">
                                    <div class="mb-3">
                                        <label for="uidNumber" class="form-label">UID Number</label>
                                        <input type="text" class="form-control" id="uidNumber" name="uid_number" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" name="full_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course" class="form-label">Course</label>
                                        <select class="form-select" id="course" name="course" required>
                                            <option value="CS">Computer Science</option>
                                            <option value="IT">Information Technology</option>
                                            <option value="ENG">Engineering</option>
                                            <option value="BUS">Business</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
                // Preloader Script
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            preloader.style.display = 'none';
        });


        const viewStudentModal = document.getElementById('viewStudentModal');
        viewStudentModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const studentId = button.getAttribute('data-id');

            // Fetch student details via AJAX (use an API or endpoint to return student data)
            fetch(`students/getStudent.php?id=${studentId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate the modal fields with the fetched data
                    document.getElementById('studentId').value = data.id;
                    document.getElementById('uidNumber').value = data.uid_number;
                    document.getElementById('fullName').value = `${data.first_name} ${data.last_name}`;
                    document.getElementById('course').value = data.course;
                })
                .catch(error => console.error('Error fetching student data:', error));
        });
    </script>
</body>
</html>
