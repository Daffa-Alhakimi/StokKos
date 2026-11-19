<?php

namespace Database\Seeders;

use App\Models\BahanMakanan;
use Illuminate\Database\Seeder;

class BahanMakananSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Beras',
                'kategori' => 'Bahan Pokok',
                'jumlah' => 5,
                'satuan' => 'kg',
                'tanggal_kedaluwarsa' => null,
            ],
            [
                'nama' => 'Telur',
                'kategori' => 'Protein',
                'jumlah' => 10,
                'satuan' => 'butir',
                'tanggal_kedaluwarsa' => now()->addDays(14)->toDateString(),
            ],
            [
                'nama' => 'Mi Instan',
                'kategori' => 'Makanan Instan',
                'jumlah' => 5,
                'satuan' => 'bungkus',
                'tanggal_kedaluwarsa' => now()->addMonths(6)->toDateString(),
            ],
            [
                'nama' => 'Minyak Goreng',
                'kategori' => 'Bahan Pokok',
                'jumlah' => 1,
                'satuan' => 'liter',
                'tanggal_kedaluwarsa' => now()->addMonths(10)->toDateString(),
            ],
        ];

        foreach ($data as $item) {
            BahanMakanan::updateOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }
    }
}
