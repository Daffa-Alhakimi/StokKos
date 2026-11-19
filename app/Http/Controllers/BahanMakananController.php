<?php

namespace App\Http\Controllers;

use App\Models\BahanMakanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BahanMakananController extends Controller
{
    /** Menampilkan seluruh persediaan bahan makanan. */
    public function index(): View
    {
        $bahanMakanan = BahanMakanan::query()
            ->orderBy('nama')
            ->get();

        $totalJenis = $bahanMakanan->count();

        return view('bahan_makanan.index', compact('bahanMakanan', 'totalJenis'));
    }

    /** Menampilkan formulir penambahan bahan makanan. */
    public function create(): View
    {
        return view('bahan_makanan.create');
    }

    /** Memvalidasi dan menyimpan bahan makanan baru. */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        BahanMakanan::create($validated);

        return redirect()
            ->route('bahan-makanan.index')
            ->with('success', 'Bahan makanan berhasil ditambahkan.');
    }

    /** Menampilkan formulir perubahan data persediaan. */
    public function edit(BahanMakanan $bahanMakanan): View
    {
        return view('bahan_makanan.edit', compact('bahanMakanan'));
    }

    /** Memvalidasi dan menyimpan perubahan data persediaan. */
    public function update(Request $request, BahanMakanan $bahanMakanan): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        $bahanMakanan->update($validated);

        return redirect()
            ->route('bahan-makanan.index')
            ->with('success', 'Data bahan makanan berhasil diperbarui.');
    }

    /** Menghapus data persediaan yang dipilih. */
    public function destroy(BahanMakanan $bahanMakanan): RedirectResponse
    {
        $bahanMakanan->delete();

        return redirect()
            ->route('bahan-makanan.index')
            ->with('success', 'Data bahan makanan berhasil dihapus.');
    }

    /** Aturan validasi dipakai saat tambah maupun ubah data. */
    private function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:100'],
            'kategori' => ['required', 'string', 'max:50'],
            'jumlah' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'satuan' => ['required', 'string', 'max:20'],
            'tanggal_kedaluwarsa' => ['nullable', 'date'],
        ];
    }
}
