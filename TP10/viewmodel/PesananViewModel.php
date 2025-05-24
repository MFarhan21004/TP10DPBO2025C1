<?php
// File: viewmodel/PesananViewModel.php

require_once 'model/Pesanan.php';
require_once 'model/Menu.php';
require_once 'model/Pelanggan.php';

class PesananViewModel {
    private $pesananModel;
    private $menuModel;
    private $pelangganModel;

    public function __construct() {
        $this->pesananModel = new Pesanan();
        $this->menuModel = new Menu();
        $this->pelangganModel = new Pelanggan();
    }

    public function getPesananList() {
        $pesananList = $this->pesananModel->getAllPesanan();
        return $this->formatPesananList($pesananList);
    }

    public function getPesananById($id) {
        $pesanan = $this->pesananModel->getPesananById($id);
        return $this->formatPesanan($pesanan);
    }

    public function getMenus() {
        return $this->menuModel->getAllMenus();
    }

    public function getPelangganList() {
        return $this->pelangganModel->getAllPelanggan();
    }

    public function addPesanan($pelanggan_id, $menu_id, $jumlah, $catatan = '') {
        // Validasi input
        $validation = $this->validatePesananInput($pelanggan_id, $menu_id, $jumlah);
        if (!$validation['valid']) {
            return $validation;
        }

        // Hitung total harga
        $menu = $this->menuModel->getMenuById($menu_id);
        $total_harga = $menu['harga'] * $jumlah;

        $result = $this->pesananModel->addPesanan($pelanggan_id, $menu_id, $jumlah, $total_harga, $catatan);
        
        return [
            'success' => $result,
            'message' => $result ? 'Pesanan berhasil ditambahkan' : 'Gagal menambahkan pesanan'
        ];
    }

    public function updatePesanan($id, $pelanggan_id, $menu_id, $jumlah, $status_pesanan, $catatan) {
        // Validasi input
        $validation = $this->validatePesananInput($pelanggan_id, $menu_id, $jumlah);
        if (!$validation['valid']) {
            return $validation;
        }

        // Hitung total harga
        $menu = $this->menuModel->getMenuById($menu_id);
        $total_harga = $menu['harga'] * $jumlah;

        $result = $this->pesananModel->updatePesanan($id, $pelanggan_id, $menu_id, $jumlah, $total_harga, $status_pesanan, $catatan);
        
        return [
            'success' => $result,
            'message' => $result ? 'Pesanan berhasil diupdate' : 'Gagal mengupdate pesanan'
        ];
    }


    public function deletePesanan($id) {
        $result = $this->pesananModel->deletePesanan($id);
        
        return [
            'success' => $result,
            'message' => $result ? 'Pesanan berhasil dihapus' : 'Gagal menghapus pesanan'
        ];
    }

    public function getMenuTerlaris($limit = 5) {
        $menuTerlaris = $this->pesananModel->getMenuTerlaris($limit);
        return $this->formatMenuTerlaris($menuTerlaris);
    }


    public function calculateTotalHarga($menu_id, $jumlah) {
        $menu = $this->menuModel->getMenuById($menu_id);
        if (!$menu) return 0;
        
        return $menu['harga'] * $jumlah;
    }

    private function formatPesananList($pesananList) {
        $formattedList = [];
        
        foreach ($pesananList as $pesanan) {
            $formattedList[] = $this->formatPesanan($pesanan);
        }
        
        return $formattedList;
    }

    private function formatPesanan($pesanan) {
        if (!$pesanan) return null;
        
        return [
            'id' => $pesanan['id'],
            'pelanggan_id' => $pesanan['pelanggan_id'],
            'nama_pelanggan' => $pesanan['nama_pelanggan'],
            'no_telepon' => $pesanan['no_telepon'] ?? '',
            'menu_id' => $pesanan['menu_id'],
            'nama_menu' => $pesanan['nama_menu'],
            'harga_satuan' => $pesanan['harga_satuan'] ?? 0,
            'jumlah' => $pesanan['jumlah'],
            'total_harga' => $pesanan['total_harga'],
            'status_pesanan' => $pesanan['status_pesanan'],
         
            'tanggal_pesanan' => $pesanan['tanggal_pesanan'],
            'catatan' => $pesanan['catatan'] ?? '',
        ];
    }

  
    private function validatePesananInput($pelanggan_id, $menu_id, $jumlah) {
        $errors = [];

        if (empty($pelanggan_id) || !is_numeric($pelanggan_id)) {
            $errors[] = 'Pelanggan harus dipilih';
        }

        if (empty($menu_id) || !is_numeric($menu_id)) {
            $errors[] = 'Menu harus dipilih';
        }

        if (empty($jumlah) || !is_numeric($jumlah) || $jumlah <= 0) {
            $errors[] = 'Jumlah harus berupa angka positif';
        }

        // Validasi keberadaan pelanggan
        if (!empty($pelanggan_id)) {
            $pelanggan = $this->pelangganModel->getPelangganById($pelanggan_id);
            if (!$pelanggan) {
                $errors[] = 'Pelanggan tidak ditemukan';
            }
        }

        // Validasi keberadaan menu
        if (!empty($menu_id)) {
            $menu = $this->menuModel->getMenuById($menu_id);
            if (!$menu) {
                $errors[] = 'Menu tidak ditemukan';
            } elseif ($menu['status'] !== 'available') {
                $errors[] = 'Menu tidak tersedia';
            }
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'message' => empty($errors) ? '' : implode(', ', $errors)
        ];
    }
}
?>