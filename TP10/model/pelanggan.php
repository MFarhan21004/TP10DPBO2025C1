<?php



require_once 'config/database.php';

class Pelanggan {
    private $conn;
    private $table_name = "pelanggan";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllPelanggan() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPelangganById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addPelanggan($nama, $no_telepon, $email, $alamat) {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nama, no_telepon, email, alamat) 
                  VALUES (:nama, :no_telepon, :email, :alamat)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':no_telepon', $no_telepon);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':alamat', $alamat);
        
        return $stmt->execute();
    }

    public function updatePelanggan($id, $nama, $no_telepon, $email, $alamat) {
        $query = "UPDATE " . $this->table_name . " 
                  SET nama = :nama, no_telepon = :no_telepon, email = :email, alamat = :alamat 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':no_telepon', $no_telepon);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':alamat', $alamat);
        
        return $stmt->execute();
    }

    public function deletePelanggan($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

   
}
?>