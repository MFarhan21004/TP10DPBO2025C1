<?php
// File: viewmodel/PelangganViewModel.php

require_once 'model/Pelanggan.php';

class PelangganViewModel {
    private $pelangganModel;

    public function __construct() {
        $this->pelangganModel = new Pelanggan();
    }

    public function getPelangganList() {
        $pelangganList = $this->pelangganModel->getAllPelanggan();
        return $this->formatPelangganList($pelangganList);
    }

    public function getPelangganById($id) {
        $pelanggan = $this->pelangganModel->getPelangganById($id);
        return $this->formatPelanggan($pelanggan);
    }

    public function getPelangganWithOrderHistory($id) {
        $pelanggan = $this->pelangganModel->getPelangganWithOrderHistory($id);
        return $this->formatPelangganWithHistory($pelanggan);
    }

    public function addPelanggan($nama, $no_telepon, $email, $alamat) {
        // Validasi input
        $validation = $this->validatePelangganInput($nama, $no_telepon, $email, $alamat);
        if (!$validation['valid']) {
            return $validation;
        }

        $result = $this->pelangganModel->addPelanggan($nama, $no_telepon, $email, $alamat);
        
        return [
            'success' => $result,
            'message' => $result ? 'Pelanggan berhasil ditambahkan' : 'Gagal menambahkan pelanggan'
        ];
    }

    public function updatePelanggan($id, $nama, $no_telepon, $email, $alamat) {
        // Validasi input
        $validation = $this->validatePelangganInput($nama, $no_telepon, $email, $alamat);
        if (!$validation['valid']) {
            return $validation;
        }

        $result = $this->pelangganModel->updatePelanggan($id, $nama, $no_telepon, $email, $alamat);
        
        return [
            'success' => $result,
            'message' => $result ? 'Data pelanggan berhasil diupdate' : 'Gagal mengupdate data pelanggan'
        ];
    }

    public function deletePelanggan($id) {
        $result = $this->pelangganModel->deletePelanggan($id);
        
        return [
            'success' => $result,
            'message' => $result ? 'Pelanggan berhasil dihapus' : 'Gagal menghapus pelanggan'
        ];
    }

    

    private function formatPelangganList($pelangganList) {
        $formattedList = [];
        
        foreach ($pelangganList as $pelanggan) {
            $formattedList[] = $this->formatPelanggan($pelanggan);
        }
        
        return $formattedList;
    }

    private function formatPelanggan($pelanggan) {
        if (!$pelanggan) return null;
        
        return [
            'id' => $pelanggan['id'],
            'nama' => $pelanggan['nama'],
            'no_telepon' => $pelanggan['no_telepon'],
            'email' => $pelanggan['email'],
            'alamat' => $pelanggan['alamat'],
            'created_at' => $pelanggan['created_at'],
        ];
    }

    private function validatePelangganInput($nama, $no_telepon, $email, $alamat) {
        $errors = [];

        if (empty(trim($nama))) {
            $errors[] = 'Nama pelanggan tidak boleh kosong';
        }

        if (!empty($no_telepon) && !preg_match('/^[0-9]{10,15}$/', $no_telepon)) {
            $errors[] = 'Nomor telepon harus berupa angka 10-15 digit';
        }

        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Format email tidak valid';
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'message' => empty($errors) ? '' : implode(', ', $errors)
        ];
    }
}