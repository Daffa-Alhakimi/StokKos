# StokKos - Source Code Laravel 12

StokKos adalah aplikasi web sederhana untuk mencatat persediaan bahan makanan pribadi anak kos. Fitur yang tersedia mengikuti proposal: melihat daftar stok, menambah data, mengubah data, menghapus data, dan mencatat tanggal kedaluwarsa secara opsional.

## Isi paket

Folder dalam paket ini merupakan file aplikasi yang ditempelkan ke project Laravel 12 baru atau project Laravel 12 yang sudah ada:

- `app/Models/BahanMakanan.php`
- `app/Http/Controllers/BahanMakananController.php`
- `routes/web.php`
- `database/migrations/...create_bahan_makanan_table.php`
- `database/seeders/...`
- `resources/views/...`
- `tests/Feature/BahanMakananTest.php`

Paket ini tidak menyertakan folder `vendor` karena dependensi Laravel dipasang melalui Composer pada komputer pengguna.

## Persyaratan

- PHP 8.2 atau lebih baru
- Composer
- MySQL atau MariaDB (dapat dijalankan melalui XAMPP)
- Project dasar Laravel 12

## Langkah instalasi di Windows + XAMPP

1. Jalankan Apache dan MySQL melalui XAMPP.
2. Buat project Laravel 12 baru dari terminal:

   ```bash
   composer create-project laravel/laravel stok-kos "^12.0"
   ```

   Jika sudah mempunyai project Laravel 12, gunakan project tersebut dan lewati langkah ini.

3. Ekstrak paket source code StokKos. Salin isi folder `StokKos_Laravel12` ke folder project Laravel. Pertahankan struktur folder dan izinkan file `routes/web.php` serta `database/seeders/DatabaseSeeder.php` menggantikan file bawaan.
4. Buka phpMyAdmin atau MySQL Workbench, lalu buat database bernama `stokkos`:

   ```sql
   CREATE DATABASE stokkos;
   ```

5. Atur koneksi MySQL pada file `.env` project Laravel:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=stokkos
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Sesuaikan username dan password jika konfigurasi MySQL berbeda.

6. Dari terminal pada folder project, jalankan:

   ```bash
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```

7. Buka `http://127.0.0.1:8000` melalui browser.

## Akun pengguna

Aplikasi ini tidak memakai login/register karena sesuai proposal, StokKos merupakan aplikasi pencatatan pribadi yang berjalan lokal. Dengan demikian, halaman utama langsung menampilkan daftar persediaan.

## Data contoh

Seeder memasukkan contoh Beras, Telur, Mi Instan, dan Minyak Goreng. Data ini hanya contoh untuk membantu pengujian awal. Data dapat diubah atau dihapus melalui aplikasi.

## Pengujian

Terdapat file pengujian fitur pada `tests/Feature/BahanMakananTest.php` untuk memeriksa tampilan daftar, tambah data, ubah stok, dan hapus data. Setelah dependensi terpasang dan konfigurasi database testing tersedia, jalankan:

```bash
php artisan test --filter=BahanMakananTest
```

## Lokasi implementasi fitur

| Bagian | Lokasi |
|---|---|
| Routing | `routes/web.php` |
| Proses CRUD dan validasi | `app/Http/Controllers/BahanMakananController.php` |
| Model/database mapping | `app/Models/BahanMakanan.php` |
| Struktur tabel | `database/migrations/2026_11_12_000001_create_bahan_makanan_table.php` |
| Halaman daftar | `resources/views/bahan_makanan/index.blade.php` |
| Form tambah dan ubah | `resources/views/bahan_makanan/create.blade.php`, `edit.blade.php`, `_form.blade.php` |

## Catatan

- `tanggal_kedaluwarsa` boleh dikosongkan sesuai batasan pada proposal.
- Jumlah stok menerima angka desimal dan tidak boleh kurang dari nol.
- Aplikasi dibuat untuk penggunaan lokal/individu. Fitur autentikasi, transaksi penjualan, dan pemesanan tidak termasuk ruang lingkup.
- Screenshot di laporan adalah pratinjau antarmuka dengan data contoh. Setelah aplikasi dijalankan, ambil screenshot dari browser sendiri untuk mengganti pratinjau tersebut sebagai bukti implementasi aktual.
