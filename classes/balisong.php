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

    public function read($type = null) {
        if ($type !== null) {
            $query = "SELECT id, nazov, znacka, typ, poznamka, datum_pridania 
                      FROM " . $this->table_name . " 
                      WHERE typ = :typ
                      ORDER BY datum_pridania DESC";
            
            $stmt = $this->conn->prepare($query);
            $type = htmlspecialchars(strip_tags($type));
            $stmt->bindParam(":typ", $type);
        } else {
            $query = "SELECT id, nazov, znacka, typ, poznamka, datum_pridania 
                      FROM " . $this->table_name . " 
                      ORDER BY datum_pridania DESC";
            
            $stmt = $this->conn->prepare($query);
        }

        $stmt->execute();
        return $stmt;
    }

    public function readLatest() {
        $query = "SELECT id, nazov, znacka, typ, poznamka 
                  FROM " . $this->table_name . " 
                  ORDER BY datum_pridania DESC 
                  LIMIT 2";

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

    public function readOne() {
        $query = "SELECT id, nazov, znacka, typ, poznamka 
                  FROM " . $this->table_name . " 
                  WHERE id = :id 
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nazov = $row['nazov'];
            $this->znacka = $row['znacka'];
            $this->typ = $row['typ'];
            $this->poznamka = $row['poznamka'];
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nazov = :nazov, znacka = :znacka, typ = :typ, poznamka = :poznamka 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nazov = htmlspecialchars(strip_tags($this->nazov));
        $this->znacka = htmlspecialchars(strip_tags($this->znacka));
        $this->typ = htmlspecialchars(strip_tags($this->typ));
        $this->poznamka = htmlspecialchars(strip_tags($this->poznamka));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nazov", $this->nazov);
        $stmt->bindParam(":znacka", $this->znacka);
        $stmt->bindParam(":typ", $this->typ);
        $stmt->bindParam(":poznamka", $this->poznamka);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>