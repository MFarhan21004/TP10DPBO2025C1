<?php 
$title = "Edit Pelanggan";
include(__DIR__ . '/../components/header.php'); 
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <?php include __DIR__ . '/../components/sidebar.php'; ?>
        </div>

        <!-- Konten Utama -->
        <div class="col-md-9 mt-4">
            <h2>Edit Pelanggan</h2>
            <form method="POST" action="index.php?entity=pelanggan&action=update&id=<?= urlencode($pelanggan['id']) ?>">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($pelanggan['nama']) ?>" required>
                </div>
                <div class="mb-3">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="<?= htmlspecialchars($pelanggan['no_telepon']) ?>">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($pelanggan['email']) ?>">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"><?= htmlspecialchars($pelanggan['alamat']) ?></textarea>
                </div>
                <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="index.php?entity=pelanggan&action=index" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../components/footer.php'); ?>
