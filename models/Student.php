<?php
require_once '../config/app.php';

class Student
{
    private $conn;

    public function __construct()
    {
        // Establish database connection
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($data)
    {
        $query = "INSERT INTO students (uid_number, first_name, middle_name, last_name, age, address, contact_number, contact_person, contact_person_number, course)
                  VALUES (:uid_number, :first_name, :middle_name, :last_name, :age, :address, :contact_number, :contact_person, :contact_person_number, :course)";

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':uid_number', $data['uid_number']);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':middle_name', $data['middle_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':contact_number', $data['contact_number']);
        $stmt->bindParam(':contact_person', $data['contact_person']);
        $stmt->bindParam(':contact_person_number', $data['contact_person_number']);
        $stmt->bindParam(':course', $data['course']);

        // Execute and return result
        return $stmt->execute();
    }
}
