
-- Skrip SQL untuk membuat database restoran dan tabel-tabel yang diperlukan
CREATE DATABASE IF NOT EXISTS restoran;
USE restoran;

-- Tabel menus
CREATE TABLE menus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_menu VARCHAR(255) NOT NULL,
    kategori ENUM('appetizer', 'main_course', 'dessert', 'beverage') NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    deskripsi TEXT,
    status ENUM('available', 'unavailable') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel pelanggan
CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    no_telepon VARCHAR(20),
    email VARCHAR(255),
    alamat TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel pesanan
CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pelanggan_id INT NOT NULL,
    menu_id INT NOT NULL,
    jumlah INT NOT NULL DEFAULT 1,
    total_harga DECIMAL(10,2) NOT NULL,
    status_pesanan ENUM('pending', 'preparing', 'ready', 'delivered') DEFAULT 'pending',
    tanggal_pesanan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    catatan TEXT,
    FOREIGN KEY (pelanggan_id) REFERENCES pelanggan(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE
);

-- Insert sample data
INSERT INTO menus (nama_menu, kategori, harga, deskripsi, status) VALUES
('Caesar Salad', 'appetizer', 25000, 'Fresh lettuce with caesar dressing', 'available'),
('Nasi Goreng Spesial', 'main_course', 35000, 'Fried rice with chicken and vegetables', 'available'),
('Ayam Bakar', 'main_course', 40000, 'Grilled chicken with special sauce', 'available'),
('Es Krim Vanilla', 'dessert', 15000, 'Homemade vanilla ice cream', 'available'),
('Jus Jeruk', 'beverage', 12000, 'Fresh orange juice', 'available'),
('Cappuccino', 'beverage', 18000, 'Italian coffee with milk foam', 'available');

INSERT INTO pelanggan (nama, no_telepon, email, alamat) VALUES
('John Doe', '081234567890', 'john@email.com', 'Jl. Sudirman No. 123'),
('Jane Smith', '081987654321', 'jane@email.com', 'Jl. Thamrin No. 456'),
('Bob Johnson', '081122334455', 'bob@email.com', 'Jl. Gatot Subroto No. 789');

INSERT INTO pesanan (pelanggan_id, menu_id, jumlah, total_harga, status_pesanan, catatan) VALUES
(1, 2, 2, 70000, 'delivered', 'Extra pedas'),
(2, 3, 1, 40000, 'ready', ''),
(3, 1, 1, 25000, 'preparing', 'Tanpa crouton'),
(1, 5, 2, 24000, 'pending', '');