## Janji
Saya Muhammad Farhan dengan NIM 2309323 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.


## 📁 Struktur Folder

![Image](https://github.com/user-attachments/assets/d9fe3a49-6640-4c22-9609-8dade06f1a8d)


## 🧱 Desain Program dan Alurnya (MVVM)

Aplikasi ini menggunakan arsitektur **MVVM (Model-View-ViewModel)** untuk memisahkan logika bisnis, tampilan, dan penghubung antar keduanya. Pendekatan ini membuat kode lebih terstruktur, mudah dipelihara, dan scalable untuk pengembangan selanjutnya.

### 📐 Struktur MVVM

- **Model (`model/`)**  
  Menangani interaksi langsung dengan database menggunakan PDO. Tiap entitas (`Menu`, `Pelanggan`, `Pesanan`) memiliki file Model masing-masing yang berisi operasi CRUD.

- **View (`view/`)**  
  Bertanggung jawab menampilkan antarmuka pengguna. Terdiri dari halaman-halaman untuk menampilkan dan mengelola data (`create.php`, `edit.php`, `index.php`) serta komponen layout (`header`, `sidebar`, `footer`).

- **ViewModel (`viewmodel/`)**  
  Berfungsi sebagai penghubung antara View dan Model. ViewModel memproses logika aplikasi, memanggil fungsi di Model, dan meneruskan data ke View.

### 🔄 Alur CRUD per Entitas

Setiap entitas (menu, pelanggan, pesanan) mengikuti alur CRUD berikut:

#### Create
- Pengguna mengisi form input pada `create.php` (View).
- Data dikirim ke ViewModel.
- ViewModel memanggil fungsi `insert()` pada Model.
- Data disimpan ke database.

#### Read
- ViewModel memanggil fungsi `getAll()` pada Model.
- Data diteruskan ke `index.php` (View) untuk ditampilkan dalam tabel.

#### Update
- Pengguna membuka form edit di `edit.php` (View).
- Setelah perubahan disubmit, ViewModel memanggil fungsi `update()` pada Model.
- Data di database diperbarui.

#### Delete
- Pengguna menekan tombol hapus pada halaman `index.php`.
- ViewModel memanggil fungsi `delete()` pada Model.
- Data dihapus dari database.

### 📌 Catatan

Struktur ini memungkinkan pengembangan sistem lebih terorganisir, di mana ViewModel menangani proses antara logika bisnis dan tampilan. Hal ini mempermudah pengujian unit, pengembangan fitur baru, dan pemisahan tanggung jawab.


## Dokumentasi 

https://github.com/user-attachments/assets/dfe8318d-1928-42e4-a9c3-78cf93a57959

![Image](https://github.com/user-attachments/assets/bf6e4af9-cf39-4ff7-b6cc-bc1805348375)

![Image](https://github.com/user-attachments/assets/501b1395-af7c-4a93-bd23-55d0a1904cbc)

![Image](https://github.com/user-attachments/assets/9dcde0b0-ae14-49d3-8d0e-96de87cf3770)

![Image](https://github.com/user-attachments/assets/8b46af4f-5d08-40c3-9e84-a89c8c54d349)

![Image](https://github.com/user-attachments/assets/6e9e96f0-5ef1-48e3-9038-278319360e01)

![Image](https://github.com/user-attachments/assets/fa8c1ba8-0385-45d4-a08e-c2eb1fec64a4)
