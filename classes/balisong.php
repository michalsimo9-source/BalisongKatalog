<?php
class Balisong {
    private $conn;
    private $table_name = "knives";

    public $id;
    public $nazov;
    public $znacka;
    public $typ;
    public $poznamka;
    public $datum_pridania;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                SET nazov=:nazov, znacka=:znacka, typ=:typ, poznamka=:poznamka";

        $stmt = $this->conn->prepare($query);

        $this->nazov = htmlspecialchars(strip_tags($this->nazov));
        $this->znacka = htmlspecialchars(strip_tags($this->znacka));
        $this->typ = htmlspecialchars(strip_tags($this->typ));
        $this->poznamka = htmlspecialchars(strip_tags($this->poznamka));

        $stmt->bindParam(":nazov", $this->nazov);
        $stmt->bindParam(":znacka", $this->znacka);
        $stmt->bindParam(":typ", $this->typ);
        $stmt->bindParam(":poznamka", $this->poznamka);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT id, nazov, znacka, typ, poznamka, datum_pridania 
                  FROM " . $this->table_name . " 
                  ORDER BY datum_pridania DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}