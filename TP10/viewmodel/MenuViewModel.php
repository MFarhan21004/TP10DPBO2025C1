<?php
// File: viewmodel/MenuViewModel.php

require_once 'model/Menu.php';

class MenuViewModel {
    private $menuModel;

    public function __construct() {
        $this->menuModel = new Menu();
    }

    public function getMenuList() {
        $menus = $this->menuModel->getAllMenus();
       
        return $this->formatMenuList($menus);
    }

    public function getMenuById($id) {
        $menu = $this->menuModel->getMenuById($id);
        return $this->formatMenu($menu);
    }



    public function addMenu($nama_menu, $kategori, $harga, $deskripsi, $status = 'available') {
        // Validasi input
        $validation = $this->validateMenuInput($nama_menu, $kategori, $harga, $deskripsi);
        if (!$validation['valid']) {
            return $validation;
        }

        $result = $this->menuModel->addMenu($nama_menu, $kategori, $harga, $deskripsi, $status);
        
        return [
            'success' => $result,
            'message' => $result ? 'Menu berhasil ditambahkan' : 'Gagal menambahkan menu'
        ];
    }

    public function updateMenu($id, $nama_menu, $kategori, $harga, $deskripsi, $status) {
        // Validasi input
        $validation = $this->validateMenuInput($nama_menu, $kategori, $harga, $deskripsi);
        if (!$validation['valid']) {
            return $validation;
        }

        $result = $this->menuModel->updateMenu($id, $nama_menu, $kategori, $harga, $deskripsi, $status);
        
        return [
            'success' => $result,
            'message' => $result ? 'Menu berhasil diupdate' : 'Gagal mengupdate menu'
        ];
    }

    public function deleteMenu($id) {
        $result = $this->menuModel->deleteMenu($id);
        
        return [
            'success' => $result,
            'message' => $result ? 'Menu berhasil dihapus' : 'Gagal menghapus menu'
        ];
    }



    private function formatMenuList($menus) {
        $formattedMenus = [];
        
        foreach ($menus as $menu) {
            $formattedMenus[] = $this->formatMenu($menu);
        }
        
        return $formattedMenus;
    }

    private function formatMenu($menu) {
        if (!$menu) return null;
        
        return [
            'id' => $menu['id'],
            'nama_menu' => $menu['nama_menu'],
            'kategori' => $menu['kategori'],
            'harga' => $menu['harga'],
            'deskripsi' => $menu['deskripsi'],
            'status' => $menu['status'],
            'created_at' => $menu['created_at'],
        ];
    }

    private function validateMenuInput($nama_menu, $kategori, $harga, $deskripsi) {
        $errors = [];

        if (empty(trim($nama_menu))) {
            $errors[] = 'Nama menu tidak boleh kosong';
        }

        if (empty($kategori)) {
            $errors[] = 'Kategori harus dipilih';
        }

        if (empty($harga) || !is_numeric($harga) || $harga <= 0) {
            $errors[] = 'Harga harus berupa angka positif';
        }

        if (empty(trim($deskripsi))) {
            $errors[] = 'Deskripsi tidak boleh kosong';
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'message' => empty($errors) ? '' : implode(', ', $errors)
        ];
    }
}
?>