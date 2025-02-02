# Manajemen Perpustakaan Digital Laravel

## Deskripsi Proyek
Perpustakaan Digital adalah aplikasi berbasis web yang dibuat menggunakan Laravel dan Bootstrap. Aplikasi ini menyediakan fitur untuk mengelola data pustaka, pengarang, penerbit, dan kategori.

---

## Fitur Utama
1. **Pengelolaan Pustaka:** Tambah, edit, hapus, dan lihat data pustaka.
2. **Pengelolaan Pengarang:** Tambah, edit, dan hapus pengarang.
3. **Pengelolaan Penerbit:** Tambah, edit, dan hapus penerbit.
4. **Pengelolaan Rak dan DDC:** Kelola rak buku dan klasifikasi DDC.
5. **Pencarian dan Filter:** Cari data berdasarkan kriteria tertentu.
6. **Upload Gambar:** Upload gambar pustaka dengan penyimpanan di storage Laravel.
7. **Transaksi:** Menambahkan Transaksi Dan Pengembalian

---

## Persyaratan Sistem
1. PHP >= 8.2
2. Composer
3. Laravel >= 11
4. MySQL/MariaDB
5. Node.js dan NPM

---

## Instalasi dan Konfigurasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd perpustakaan-digital
```

### 2. Instalasi Dependensi
- Install Composer:
  ```bash
  composer install
  ```
- Install NPM:
  ```bash
  npm install && npm run dev
  ```

### 3. Konfigurasi Lingkungan
- Salin file `.env.example` menjadi `.env`:
  ```bash
  cp .env.example .env
  ```
- Atur konfigurasi database di file `.env`:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=perpustakaan
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### 4. Generate Key
```bash
php artisan key:generate
```

### 5. Migrasi dan Seed Database
```bash
php artisan migrate --seed
```

### 6. Jalankan Server Lokal
```bash
php artisan serve
```
Akses aplikasi di: [http://127.0.0.1:8000](http://127.0.0.1:8000)

