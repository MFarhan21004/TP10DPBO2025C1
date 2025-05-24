<?php 
$title = "Daftar Menu";
include(__DIR__ . '/../components/header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?php include (__DIR__ .'/../components/sidebar.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="main-content p-4">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2><i class="fas fa-book-open me-2"></i>Daftar Menu</h2>
                        <p class="text-muted">Kelola menu restoran Anda</p>
                    </div>
                    <a href="index.php?entity=menu&action=create" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Tambah Menu
                    </a>
                </div>

                <!-- Menu Table -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Menu</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Tanggal Pembuatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody data-bind="menuTable">
                                    <?php 
                                    $i = 1; // Inisialisasi nomor urut
                                    foreach ($menuList as $menu): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= htmlspecialchars($menu['nama_menu']) ?></td>
                                        <td><?= htmlspecialchars($menu['kategori']) ?></td>
                                        <td>Rp <?= number_format($menu['harga'], 2, ',', '.') ?></td>
                                        <td><?= htmlspecialchars($menu['deskripsi']) ?></td>
                                        <td><?= $menu['status'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                                        <td><?= date('d-m-Y', strtotime($menu['created_at'])) ?></td>
                                        <td>
                                            <a href="index.php?entity=menu&action=edit&id=<?= $menu['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="index.php?entity=menu&action=delete&id=<?= $menu['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus menu ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include (__DIR__ . '/../components/footer.php'); ?>
