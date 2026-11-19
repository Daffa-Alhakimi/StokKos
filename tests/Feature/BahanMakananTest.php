<?php

namespace Tests\Feature;

use App\Models\BahanMakanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BahanMakananTest extends TestCase
{
    use RefreshDatabase;

    public function test_daftar_stok_dapat_dibuka(): void
    {
        BahanMakanan::create([
            'nama' => 'Beras',
            'kategori' => 'Bahan Pokok',
            'jumlah' => 5,
            'satuan' => 'kg',
            'tanggal_kedaluwarsa' => null,
        ]);

        $this->get(route('bahan-makanan.index'))
            ->assertOk()
            ->assertSee('Beras');
    }

    public function test_bahan_makanan_dapat_ditambahkan(): void
    {
        $response = $this->post(route('bahan-makanan.store'), [
            'nama' => 'Telur',
            'kategori' => 'Protein',
            'jumlah' => 10,
            'satuan' => 'butir',
            'tanggal_kedaluwarsa' => '2026-12-01',
        ]);

        $response->assertRedirect(route('bahan-makanan.index'));
        $this->assertDatabaseHas('bahan_makanan', ['nama' => 'Telur', 'jumlah' => 10]);
    }

    public function test_jumlah_stok_dapat_diperbarui(): void
    {
        $item = BahanMakanan::create([
            'nama' => 'Beras', 'kategori' => 'Bahan Pokok', 'jumlah' => 5,
            'satuan' => 'kg', 'tanggal_kedaluwarsa' => null,
        ]);

        $this->put(route('bahan-makanan.update', $item), [
            'nama' => 'Beras', 'kategori' => 'Bahan Pokok', 'jumlah' => 3,
            'satuan' => 'kg', 'tanggal_kedaluwarsa' => null,
        ])->assertRedirect(route('bahan-makanan.index'));

        $this->assertDatabaseHas('bahan_makanan', ['id' => $item->id, 'jumlah' => 3]);
    }

    public function test_bahan_makanan_dapat_dihapus(): void
    {
        $item = BahanMakanan::create([
            'nama' => 'Mi Instan', 'kategori' => 'Makanan Instan', 'jumlah' => 5,
            'satuan' => 'bungkus', 'tanggal_kedaluwarsa' => null,
        ]);

        $this->delete(route('bahan-makanan.destroy', $item))
            ->assertRedirect(route('bahan-makanan.index'));

        $this->assertDatabaseMissing('bahan_makanan', ['id' => $item->id]);
    }
}
