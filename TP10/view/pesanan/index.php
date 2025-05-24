<?php 
$title = "Daftar Pesanan";
include __DIR__ . '/../components/header.php'; 
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <?php include __DIR__ . '/../components/sidebar.php'; ?>
        </div>

        <!-- Konten utama -->
        <div class="col-md-9 mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Daftar Pesanan</h2>
                <a href="index.php?entity=pesanan&action=create" class="btn btn-primary">+ Tambah Pesanan</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pelanggan</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Pesanan</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesananList as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['nama_pelanggan']) ?></td>
                            <td><?= htmlspecialchars($p['nama_menu']) ?></td>
                            <td><?= $p['jumlah'] ?></td>
                            <td>Rp <?= number_format($p['total_harga'], 2, ',', '.') ?></td>
                            <td><?= ucfirst($p['status_pesanan']) ?></td>
                            <td><?= $p['tanggal_pesanan'] ?></td>
                            <td><?= htmlspecialchars($p['catatan']) ?></td>
                            <td>
                                
                                <a href="index.php?entity=pesanan&action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="index.php?entity=pesanan&action=delete&id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/footer.php'; ?>
