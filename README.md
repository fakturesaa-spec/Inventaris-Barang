<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistem Inventaris Barang

Aplikasi web berbasis Laravel untuk mencatat dan mengelola data inventaris barang.
Dibuat untuk Tes Magang ARRE Tech.

## Fitur
- Register, login, dan logout
- CRUD barang: daftar, tambah, detail, edit, hapus
- CRUD peminjaman barang
- Validasi input dan pembatasan akses data per pengguna
- Pengurangan stok otomatis saat barang dipinjam
- Penambahan stok otomatis saat barang dikembalikan
- Penolakan peminjaman jika jumlah melebihi stok tersedia
- Penolakan penghapusan barang yang masih memiliki peminjaman aktif atau terlambat
- Pencarian barang
- Dashboard ringkasan (total barang, total stok, kondisi, kategori)
- Halaman login dan register dengan template adminHMD
- Tampilan responsif dengan Bootstrap

## Teknologi
- PHP 8.3+, Laravel 13
- MySQL
- Bootstrap 5
- Laravel Breeze (autentikasi)


## Cara Menggunakan
1. Daftar akun lewat halaman **Register**, lalu login.
2. Dashboard menampilkan ringkasan data barang.
3. Buka menu **Daftar Barang** untuk melihat semua barang.
4. Klik **Tambah Barang**, isi form, lalu simpan.
5. Gunakan ikon mata untuk melihat detail, pensil untuk mengedit, dan tong sampah untuk menghapus.
6. Buka menu **Peminjaman** untuk mencatat dan mengelola peminjaman barang.
7. Stok berkurang otomatis saat peminjaman aktif dibuat. Jika jumlah pinjaman melebihi stok, data ditolak.
8. Ubah status peminjaman menjadi **Dikembalikan** untuk mengembalikan jumlah barang ke stok.
9. Barang tidak dapat dihapus selama memiliki peminjaman berstatus **Dipinjam** atau **Terlambat**.
10. Gunakan kotak pencarian untuk mencari barang.
11. Klik **Sign out** untuk keluar.

## Struktur Proyek
| File / Folder | Fungsi |
|---|---|
| `app/Models/Barang.php` | Model barang dan relasinya |
| `app/Models/Peminjaman.php` | Model peminjaman dan relasinya ke barang |
| `app/Http/Controllers/BarangController.php` | Logika CRUD barang |
| `app/Http/Controllers/PeminjamanController.php` | Logika peminjaman dan perubahan stok |
| `app/Http/Requests/` | Request autentikasi dan validasi terkait |
| `database/migrations/` | Struktur tabel |
| `resources/views/barang/` | Tampilan CRUD (index, create, edit, show) |
| `resources/views/peminjaman/` | Tampilan daftar, form, dan detail peminjaman |
| `resources/views/auth/` | Tampilan login dan register |
| `resources/views/layouts/` | Layout dan sidebar |
| `routes/web.php` | Daftar route aplikasi |

## Struktur Database
**barangs**: id, user_id, kode_barang, nama_barang, kategori, stok, satuan, harga_satuan, kondisi, timestamps

**peminjamans**: id, barang_id, nama_peminjam, jumlah_pinjam, tanggal_pinjam, tanggal_kembali, status, timestamps


## Pembuat
Anif Fakturesa Ravael (fakturesa@gmail.com)