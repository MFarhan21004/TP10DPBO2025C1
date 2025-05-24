<?php 
$title = "Tambah Pelanggan";
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
            <h2>Tambah Pelanggan</h2>
             <form method="POST" action="index.php?entity=pelanggan&action=save" data-bind="menuForm" novalidate>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="index.php?entity=pelanggan&action=index" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../components/footer.php'); ?>
