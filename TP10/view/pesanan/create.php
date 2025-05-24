<?php 
$title = "Tambah Pesanan";
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
            <h2>Tambah Pesanan</h2>
            <form method="POST" action="index.php?entity=pesanan&action=save" data-bind="menuForm" novalidate>
                <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="pelanggan_id" class="form-select" required>
                        <option value="" disabled selected>Pilih pelanggan</option>
                        <?php foreach ($pelangganList as $pel): ?>
                            <option value="<?= $pel['id'] ?>"><?= htmlspecialchars($pel['nama']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Menu</label>
                    <select name="menu_id" class="form-select" required>
                        <option value="" disabled selected>Pilih menu</option>
                        <?php foreach ($menus as $menu): ?>
                            <option value="<?= $menu['id'] ?>"><?= htmlspecialchars($menu['nama_menu']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" min="1" value="1" required>
                </div>
                <div class="mb-3">
                    <label>Catatan (opsional)</label>
                    <textarea name="catatan" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="index.php?entity=pesanan&action=index" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/footer.php'; ?>
