<?php 
$title = "Daftar Pelanggan";
include(__DIR__ . '/../components/header.php');
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
                <h2>Daftar Pelanggan</h2>
                <a href="index.php?entity=pelanggan&action=create" class="btn btn-primary">+ Tambah Pelanggan</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pelangganList as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($p['nama']) ?></td>
                            <td><?= htmlspecialchars($p['no_telepon']) ?></td>
                            <td><?= htmlspecialchars($p['email']) ?></td>
                            <td><?= htmlspecialchars($p['alamat']) ?></td>
                            <td>
                                <a href="index.php?entity=pelanggan&action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="index.php?entity=pelanggan&action=delete&id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../components/footer.php'); ?>
