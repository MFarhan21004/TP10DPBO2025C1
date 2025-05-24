<?php 
$title = "Edit Pesanan";
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
            <h2>Edit Pesanan</h2>
            <form method="POST" action="index.php?entity=pesanan&action=update&id=<?= $pesanan['id'] ?>" data-bind="menuForm" novalidate>
                <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="pelanggan_id" class="form-select" required>
                        <?php foreach ($pelangganList as $pel): ?>
                            <option value="<?= $pel['id'] ?>" <?= ($pel['id'] == $pesanan['pelanggan_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($pel['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Menu</label>
                    <select name="menu_id" class="form-select" required>
                        <?php foreach ($menus as $menu): ?>
                            <option value="<?= $menu['id'] ?>" <?= ($menu['id'] == $pesanan['menu_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($menu['nama_menu']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" min="1" value="<?= $pesanan['jumlah'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Status Pesanan</label>
                    <select name="status_pesanan" class="form-select" required>
                        <?php 
                        $statusOptions = ['pending', 'preparing', 'ready', 'delivered'];
                        foreach ($statusOptions as $status): 
                        ?>
                            <option value="<?= $status ?>" <?= ($pesanan['status_pesanan'] == $status) ? 'selected' : '' ?>>
                                <?= ucfirst($status) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Catatan</label>
                    <textarea name="catatan" class="form-control"><?= htmlspecialchars($pesanan['catatan']) ?></textarea>
                </div>
                <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="index.php?entity=pesanan&action=index" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/footer.php'; ?>
