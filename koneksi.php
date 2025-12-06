<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";   // kosong di XAMPP
    private $db   = "kasir_toko";

    public $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db,
                $this->user,
                $this->pass
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;

        } catch(PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
    }
}
?>