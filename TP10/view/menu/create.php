<?php 
$title = "Tambah Menu Baru";
include(__DIR__ . '/../components/header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?php include __DIR__ . '/../components/sidebar.php'; ?>
        </div>
        <div class="col-md-9">
            <div class="main-content p-4">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2><i class="fas fa-plus me-2"></i>Tambah Menu Baru</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                
                                <li class="breadcrumb-item"><a href="index.php">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Menu</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <!-- Form Section -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Informasi Menu</h5>
                            </div>
                            <div class="card-body">
                                <form id="menuForm" method="POST" action="index.php?entity=menu&action=save" data-bind="menuForm" novalidate>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="namaMenu" class="form-label">Nama Menu <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="namaMenu" name="nama_menu" 
                                                       data-bind="namaMenu" required>
                                                <div class="invalid-feedback" data-bind="namaMenuError"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                                                <select class="form-select" id="kategori" name="kategori" 
                                                        data-bind="kategori" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="appetizer">Appetizer</option>
                                                    <option value="main_course">Main Course</option>
                                                    <option value="dessert">Dessert</option>
                                                    <option value="beverage">Minuman</option>
                                                </select>
                                                <div class="invalid-feedback" data-bind="kategoriError"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="number" class="form-control" id="harga" name="harga" 
                                                           data-bind="harga" min="0" step="1000" required>
                                                </div>
                                                <div class="invalid-feedback" data-bind="hargaError"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-select" id="status" name="status" data-bind="status">
                                                    <option value="available">Tersedia</option>
                                                    <option value="unavailable">Tidak Tersedia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" 
                                                  data-bind="deskripsi" placeholder="Masukkan deskripsi menu..."></textarea>
                                        <div class="form-text">Opsional - Deskripsi singkat tentang menu</div>
                                    </div>

                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">
                                            <i class="fas fa-times me-1"></i>Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary" data-bind="submitBtn">
                                            <i class="fas fa-save me-1"></i>Simpan Menu
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Help Card -->
                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="mb-0"><i class="fas fa-info-circle me-1"></i>Bantuan</h6>
                            </div>
                            <div class="card-body">
                                <small class="text-muted">
                                    <strong>Tips:</strong><br>
                                    • Gunakan nama menu yang jelas dan menarik<br>
                                    • Pilih kategori yang sesuai<br>
                                    • Harga dalam format Rupiah<br>
                                    • Deskripsi membantu pelanggan memahami menu<br>
                                    • Status menentukan ketersediaan menu
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/footer.php'; ?>

