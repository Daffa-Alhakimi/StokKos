-- Referensi struktur database StokKos.
-- Bila menggunakan Laravel, lebih disarankan membuat tabel melalui `php artisan migrate`.
CREATE DATABASE IF NOT EXISTS stokkos;
USE stokkos;

CREATE TABLE IF NOT EXISTS bahan_makanan (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    jumlah DECIMAL(10,2) NOT NULL DEFAULT 0,
    satuan VARCHAR(20) NOT NULL,
    tanggal_kedaluwarsa DATE NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
