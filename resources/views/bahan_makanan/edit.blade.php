@extends('layouts.app')

@section('title', 'Edit Stok')

@section('content')
<div class="mb-4">
    <a href="{{ route('bahan-makanan.index') }}" class="text-decoration-none text-green small">&larr; Kembali ke daftar stok</a>
    <h1 class="h3 fw-bold mt-2 mb-1">Edit Bahan Makanan</h1>
    <p class="text-secondary mb-0">Perbarui informasi atau jumlah persediaan.</p>
</div>

<div class="card p-3 p-md-4">
    <form action="{{ route('bahan-makanan.update', $bahanMakanan) }}" method="POST">
        @csrf
        @method('PUT')
        @include('bahan_makanan._form', ['bahanMakanan' => $bahanMakanan])
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
            <a href="{{ route('bahan-makanan.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
