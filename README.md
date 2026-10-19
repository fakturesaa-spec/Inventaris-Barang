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
- Validasi input (Form Request)
- Pencarian barang
- Dashboard ringkasan (total barang, total stok, kondisi, kategori)
- Tampilan responsif dengan Bootstrap

## Teknologi
- PHP 8.x, Laravel 1x
- MySQL / SQLite
- Bootstrap 5
- Laravel Breeze (autentikasi)


## Cara Menggunakan
1. Daftar akun lewat halaman **Register**, lalu login.
2. Dashboard menampilkan ringkasan data barang.
3. Buka menu **Daftar Barang** untuk melihat semua barang.
4. Klik **Tambah Barang**, isi form, lalu simpan.
5. Gunakan ikon mata untuk melihat detail, pensil untuk mengedit, dan tong sampah untuk menghapus.
6. Gunakan kotak pencarian untuk mencari barang.
7. Klik **Sign out** untuk keluar.

## Struktur Proyek
| File / Folder | Fungsi |
|---|---|
| `app/Models/Produk.php` | Model barang dan relasinya |
| `app/Http/Controllers/ProdukController.php` | Logika CRUD barang |
| `app/Http/Requests/` | Validasi input |
| `database/migrations/` | Struktur tabel |
| `database/seeders/` | Data awal dan akun demo |
| `resources/views/produk/` | Tampilan CRUD (index, create, edit, show) |
| `resources/views/layouts/` | Layout dan sidebar |
| `routes/web.php` | Daftar route aplikasi |

## Struktur Database
**produks**: id, user_id, kode_barang, nama_barang, kategori, stok, satuan, harga_satuan, kondisi, timestamps

## Screenshot
![Dashboard](gambar/dashboard.png)
![Daftar Barang](gambar/daftarBarang.png)

## Pembuat
Nama Kamu (email atau GitHub)