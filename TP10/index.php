<?php
// File: index.php

require_once 'viewmodel/MenuViewModel.php';
require_once 'viewmodel/PelangganViewModel.php';
require_once 'viewmodel/PesananViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'menu';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';


// Menu Management
if ($entity == 'menu') {
    $viewModel = new MenuViewModel();
    
    if ($action == 'index') {
        $menuList = $viewModel->getMenuList();
        require_once 'view/menu/index.php';
    } 
    elseif ($action == 'create') {
        require_once 'view/menu/create.php';
    } 
    elseif ($action == 'save') {
        $result = $viewModel->addMenu($_POST['nama_menu'], $_POST['kategori'], $_POST['harga'], $_POST['deskripsi'], $_POST['status']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=menu');
        exit;
    } 
    elseif ($action == 'edit') {
        $menu = $viewModel->getMenuById($_GET['id']);
        require_once 'view/menu/edit.php';
    } 
    elseif ($action == 'update') {
        $result = $viewModel->updateMenu($_GET['id'], $_POST['nama_menu'], $_POST['kategori'], $_POST['harga'], $_POST['deskripsi'], $_POST['status']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=menu');
        exit;
    } 
    elseif ($action == 'delete') {
        $result = $viewModel->deleteMenu($_GET['id']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=menu');
        exit;
    }
}

// Pelanggan Management
elseif ($entity == 'pelanggan') {
    $viewModel = new PelangganViewModel();
    
    if ($action == 'index') {
        $pelangganList = $viewModel->getPelangganList();
        require_once 'view/pelanggan/index.php';
    } 
    elseif ($action == 'create') {

        require_once 'view/pelanggan/create.php';
    } 
    elseif ($action == 'save') {
        
        $result = $viewModel->addPelanggan($_POST['nama'], $_POST['no_telepon'], $_POST['email'], $_POST['alamat']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=pelanggan');
        exit;
    } 
    elseif ($action == 'edit') {
        $pelanggan = $viewModel->getPelangganById($_GET['id']);
        require_once 'view/pelanggan/edit.php';
    } 
    elseif ($action == 'update') {
        $result = $viewModel->updatePelanggan($_GET['id'], $_POST['nama'], $_POST['no_telepon'], $_POST['email'], $_POST['alamat']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=pelanggan');
        exit;
    } 
    elseif ($action == 'delete') {
        $result = $viewModel->deletePelanggan($_GET['id']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=pelanggan');
        exit;
    }
}

// Pesanan Management
elseif ($entity == 'pesanan') {
    $viewModel = new PesananViewModel();
    
    if ($action == 'index') {
        $pesananList = $viewModel->getPesananList();
        require_once 'view/pesanan/index.php';
    } 
    elseif ($action == 'create') {
        $menus = $viewModel->getMenus();
        $pelangganList = $viewModel->getPelangganList();
        require_once 'view/pesanan/create.php';
    } 
    elseif ($action == 'save') {
        $result = $viewModel->addPesanan($_POST['pelanggan_id'], $_POST['menu_id'], $_POST['jumlah'], $_POST['catatan']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=pesanan');
        exit;
    } 
    elseif ($action == 'edit') {
        $pesanan = $viewModel->getPesananById($_GET['id']);
        $menus = $viewModel->getMenus();
        $pelangganList = $viewModel->getPelangganList();
        require_once 'view/pesanan/edit.php';
    } 
  
    elseif ($action == 'update') {
        $result = $viewModel->updatePesanan($_GET['id'], $_POST['pelanggan_id'], $_POST['menu_id'], $_POST['jumlah'], $_POST['status_pesanan'], $_POST['catatan']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=pesanan');
        exit;
    } 
    elseif ($action == 'delete') {
        $result = $viewModel->deletePesanan($_GET['id']);
        $_SESSION['message'] = $result['message'];
        $_SESSION['message_type'] = $result['success'] ? 'success' : 'error';
        header('Location: index.php?entity=pesanan');
        exit;
    }
}

?>