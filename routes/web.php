<?php

use App\Http\Controllers\BahanMakananController;
use Illuminate\Support\Facades\Route;

// StokKos digunakan secara pribadi, sehingga halaman daftar stok menjadi halaman utama.
Route::get('/', function () {
    return redirect()->route('bahan-makanan.index');
});

Route::resource('bahan-makanan', BahanMakananController::class)
    ->parameters(['bahan-makanan' => 'bahanMakanan'])
    ->except(['show']);
