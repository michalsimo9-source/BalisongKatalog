<?php
class Database {
    private $host = "localhost";
    private $db_name = "balisong_db";
    private $username = "root"; 
    private $password = "";     
    public $conn;

    // Metóda na získanie pripojenia
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8mb4");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Chyba pripojenia k DB: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>