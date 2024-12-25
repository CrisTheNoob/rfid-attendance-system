<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'rfid_db';
    private $username = 'root';
    private $password = '';
    public $conn;


    // Hostinger Database
    // private $host = 'localhost';
    // private $db_name = 'u186082990_attendance_db';
    // private $username = 'u186082990_attendance_db';
    // private $password = '$7p[iZsFs';

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
