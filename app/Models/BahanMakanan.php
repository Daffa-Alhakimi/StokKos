<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanMakanan extends Model
{
    // Nama tabel dibuat eksplisit karena menggunakan bentuk tunggal bahasa Indonesia.
    protected $table = 'bahan_makanan';

    protected $fillable = [
        'nama',
        'kategori',
        'jumlah',
        'satuan',
        'tanggal_kedaluwarsa',
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'tanggal_kedaluwarsa' => 'date',
    ];
}
