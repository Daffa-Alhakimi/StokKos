@extends('layouts.app')

@section('title', 'Daftar Stok')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <div class="muted-label text-uppercase fw-bold mb-1">Persediaan pribadi</div>
        <h1 class="h3 fw-bold mb-1">Daftar Bahan Makanan</h1>
        <p class="text-secondary mb-0">Pantau bahan makanan yang tersedia di kos.</p>
    </div>
    <a href="{{ route('bahan-makanan.create') }}" class="btn btn-primary px-4 py-2">+ Tambah Bahan</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3">
            <div class="muted-label">Total jenis bahan</div>
            <div class="display-6 fw-bold text-green">{{ $totalJenis }}</div>
            <div class="small text-secondary">Jenis bahan makanan yang tercatat</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-8">
        <div class="soft-panel h-100 p-3 d-flex align-items-center">
            <div>
                <div class="fw-semibold text-green mb-1">Catatan StokKos</div>
                <div class="small text-secondary">Perbarui jumlah persediaan setiap kali membeli atau menggunakan bahan makanan agar catatan tetap sesuai.</div>
            </div>
        </div>
    </div>
</div>

<div class="card overflow-hidden">
    <div class="p-3 p-md-4 border-bottom d-flex justify-content-between align-items-center">
        <div>
            <h2 class="h5 fw-bold mb-1">Persediaan saat ini</h2>
            <div class="small text-secondary">Daftar bahan makanan yang tersimpan.</div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th class="ps-4">No.</th>
                    <th>Nama Bahan</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Kedaluwarsa</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bahanMakanan as $index => $item)
                    @php
                        $jumlahTampil = rtrim(rtrim(number_format((float) $item->jumlah, 2, ',', '.'), '0'), ',');
                    @endphp
                    <tr>
                        <td class="ps-4 text-secondary">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $item->nama }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $jumlahTampil }} {{ $item->satuan }}</td>
                        <td>
                            @if ($item->tanggal_kedaluwarsa)
                                {{ $item->tanggal_kedaluwarsa->format('d-m-Y') }}
                            @else
                                <span class="text-secondary">-</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('bahan-makanan.edit', $item) }}" class="btn btn-sm btn-outline-success">Edit</a>
                            <form action="{{ route('bahan-makanan.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data {{ $item->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-secondary">Belum ada bahan makanan. Tekan tombol Tambah Bahan untuk mulai mencatat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
