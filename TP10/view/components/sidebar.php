

<div class="sidebar bg-light p-3" style="min-height: calc(100vh - 56px);">
    <div class="list-group list-group-flush">
        <div class="list-group-item bg-transparent border-0 px-0">
            <h6 class="text-muted text-uppercase small">Main Menu</h6>
        </div>

        <a href="index.php?entity=menu" class="list-group-item list-group-item-action border-0 rounded mb-1 <?= isActive('menu') ?>">
            <i class="fas fa-book-open me-2"></i>Menu
            
        </a>

        <a href="index.php?entity=pelanggan" class="list-group-item list-group-item-action border-0 rounded mb-1 <?= isActive('pelanggan') ?>">
            <i class="fas fa-users me-2"></i>Pelanggan
            
        </a>

        <a href="index.php?entity=pesanan" class="list-group-item list-group-item-action border-0 rounded mb-1 <?= isActive('pesanan') ?>">
            <i class="fas fa-shopping-cart me-2"></i>Pesanan
    
        </a>

        <div class="list-group-item bg-transparent border-0 px-0 mt-3">
            <h6 class="text-muted text-uppercase small">Quick Actions</h6>
        </div>

        <a href="index.php?entity=menu&action=create" class="list-group-item list-group-item-action border-0 rounded mb-1">
            <i class="fas fa-plus me-2"></i>Tambah Menu
        </a>

        <a href="index.php?entity=pelanggan&action=create" class="list-group-item list-group-item-action border-0 rounded mb-1">
            <i class="fas fa-user-plus me-2"></i>Tambah Pelanggan
        </a>

        <a href="index.php?entity=pesanan&action=create" class="list-group-item list-group-item-action border-0 rounded mb-1">
            <i class="fas fa-cart-plus me-2"></i>Buat Pesanan
        </a>
    </div>

    <div class="mt-4 p-3 bg-primary text-white rounded">
        <h6 class="mb-2">Status Sistem</h6>
        <small>
            <i class="fas fa-circle text-success me-1"></i>Online<br>
            
        </small>
    </div>
</div>
