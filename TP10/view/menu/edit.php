<?php 
$title = "Edit Menu";
include (__DIR__. '/../components/header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?php include (__DIR__. '/../components/sidebar.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="main-content p-4">
                <h2>Edit Menu</h2>

                <form method="post" action="index.php?entity=menu&action=update&id=<?= htmlspecialchars($menu['id']) ?>">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($menu['id']) ?>">

                    <div class="mb-3">
                        <label for="namaMenu" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="namaMenu" name="nama_menu" 
                               value="<?= htmlspecialchars($menu['nama_menu']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="appetizer" <?= $menu['kategori'] == 'appetizer' ? 'selected' : '' ?>>Appetizer</option>
                            <option value="main_course" <?= $menu['kategori'] == 'main_course' ? 'selected' : '' ?>>Main Course</option>
                            <option value="dessert" <?= $menu['kategori'] == 'dessert' ? 'selected' : '' ?>>Dessert</option>
                            <option value="beverage" <?= $menu['kategori'] == 'beverage' ? 'selected' : '' ?>>Minuman</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" 
                               value="<?= htmlspecialchars($menu['harga']) ?>" min="0" step="1000" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="available" <?= $menu['status'] == 'available' ? 'selected' : '' ?>>Tersedia</option>
                            <option value="unavailable" <?= $menu['status'] == 'unavailable' ? 'selected' : '' ?>>Tidak Tersedia</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                        ><?= htmlspecialchars($menu['deskripsi']) ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Menu</button>
                    <a href="index.php?entity=menu" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include (__DIR__. '/../components/footer.php'); ?>
