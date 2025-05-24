<?php

require_once 'config/database.php';

class Menu {
    private $conn;
    private $table_name = "menus";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllMenus() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMenuById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addMenu($nama_menu, $kategori, $harga, $deskripsi, $status = 'available') {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nama_menu, kategori, harga, deskripsi, status) 
                  VALUES (:nama_menu, :kategori, :harga, :deskripsi, :status)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_menu', $nama_menu);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':status', $status);
       
        return $stmt->execute();
    }

    public function updateMenu($id, $nama_menu, $kategori, $harga, $deskripsi, $status) {
        $query = "UPDATE " . $this->table_name . " 
                  SET nama_menu = :nama_menu, kategori = :kategori, harga = :harga, 
                      deskripsi = :deskripsi, status = :status 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama_menu', $nama_menu);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':status', $status);
        
        return $stmt->execute();
    }

    public function deleteMenu($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

  
}
?>