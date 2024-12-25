<?php
require_once '../models/Student.php';

class RegistrationController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $uid_number = $_POST['uid_number'];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            $contact_person = $_POST['contact_person'];
            $contact_person_number = $_POST['contact_person_number'];
            $course = $_POST['course'];

            // Validate data (optional but recommended)
            if (empty($uid_number) || empty($first_name) || empty($last_name) || empty($age) || empty($address) || empty($contact_number) || empty($course)) {
                echo "All required fields must be filled!";
                return;
            }

            // Insert data into the database using the model
            $student = new Student();
            $isInserted = $student->create([
                'uid_number' => $uid_number,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'age' => $age,
                'address' => $address,
                'contact_number' => $contact_number,
                'contact_person' => $contact_person,
                'contact_person_number' => $contact_person_number,
                'course' => $course,
            ]);

            // Redirect or show success/error message
            if ($isInserted) {
                header("Location: ../views/register.php?success=1");
                exit();
            } else {
                echo "Error registering student.";
            }
        }
    }
}

// Instantiate the controller and call the register method
$controller = new RegistrationController();
$controller->register();
