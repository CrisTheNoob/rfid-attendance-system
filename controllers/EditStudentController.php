<?php
require_once '../config/app.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $id = $_POST['id'];
    $uid_number = $_POST['uid_number'];
    $full_name = $_POST['full_name'];
    $course = $_POST['course'];

    // Split full name into first name and last name
    $nameParts = explode(' ', $full_name, 2);
    $first_name = $nameParts[0];
    $last_name = isset($nameParts[1]) ? $nameParts[1] : '';

    try {
        // Establish database connection
        $database = new Database();
        $conn = $database->getConnection();

        // Update query
        $query = "UPDATE students 
                  SET uid_number = :uid_number, first_name = :first_name, last_name = :last_name, course = :course 
                  WHERE id = :id";

        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':uid_number', $uid_number);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':id', $id);

        // Execute the update
        if ($stmt->execute()) {
            // Redirect with a success message
            header("Location: ../views/dashboard.php?success=Student updated successfully");
            exit();
        } else {
            // Redirect with an error message
            header("Location: ../views/dashboard.php?error=Failed to update student");
            exit();
        }
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect if accessed without POST
    header("Location: ../views/dashboard.php");
    exit();
}
