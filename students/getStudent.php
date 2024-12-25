<?php
require_once '../config/app.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new Database();
    $conn = $db->getConnection();
    $query = "SELECT * FROM students WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($student);
}
?>
