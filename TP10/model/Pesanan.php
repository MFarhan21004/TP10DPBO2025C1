<?php
// File: model/Pesanan.php

require_once 'config/database.php';

class Pesanan {
    private $conn;
    private $table_name = "pesanan";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllPesanan() {
        $query = "SELECT p.*, 
                         pel.nama as nama_pelanggan, 
                         pel.no_telepon,
                         m.nama_menu, 
                         m.harga as harga_satuan
                  FROM " . $this->table_name . " p
                  JOIN pelanggan pel ON p.pelanggan_id = pel.id
                  JOIN menus m ON p.menu_id = m.id
                  ORDER BY p.tanggal_pesanan ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPesananById($id) {
        $query = "SELECT p.*, 
                         pel.nama as nama_pelanggan, 
                         pel.no_telepon, 
                         pel.alamat,
                         m.nama_menu, 
                         m.harga as harga_satuan,
                         m.kategori
                  FROM " . $this->table_name . " p
                  JOIN pelanggan pel ON p.pelanggan_id = pel.id
                  JOIN menus m ON p.menu_id = m.id
                  WHERE p.id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addPesanan($pelanggan_id, $menu_id, $jumlah, $total_harga, $catatan = '') {
        $query = "INSERT INTO " . $this->table_name . " 
                  (pelanggan_id, menu_id, jumlah, total_harga, catatan) 
                  VALUES (:pelanggan_id, :menu_id, :jumlah, :total_harga, :catatan)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pelanggan_id', $pelanggan_id);
        $stmt->bindParam(':menu_id', $menu_id);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total_harga', $total_harga);
        $stmt->bindParam(':catatan', $catatan);
        
        return $stmt->execute();
    }

    public function updatePesanan($id, $pelanggan_id, $menu_id, $jumlah, $total_harga, $status_pesanan, $catatan) {
        $query = "UPDATE " . $this->table_name . " 
                  SET pelanggan_id = :pelanggan_id, menu_id = :menu_id, jumlah = :jumlah, 
                      total_harga = :total_harga, status_pesanan = :status_pesanan, catatan = :catatan 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pelanggan_id', $pelanggan_id);
        $stmt->bindParam(':menu_id', $menu_id);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total_harga', $total_harga);
        $stmt->bindParam(':status_pesanan', $status_pesanan);
        $stmt->bindParam(':catatan', $catatan);
        
        return $stmt->execute();
    }


    public function deletePesanan($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>