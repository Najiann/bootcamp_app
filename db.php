<?php

class Database {
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db = "db_bootcamp";
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("koneksi gagal! " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}

$db = new Database();
$conn = $db->getConnection();   