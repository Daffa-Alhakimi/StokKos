@extends('layouts.app')

@section('title', 'Tambah Bahan')

@section('content')
<div class="mb-4">
    <a href="{{ route('bahan-makanan.index') }}" class="text-decoration-none text-green small">&larr; Kembali ke daftar stok</a>
    <h1 class="h3 fw-bold mt-2 mb-1">Tambah Bahan Makanan</h1>
    <p class="text-secondary mb-0">Masukkan informasi bahan makanan yang ingin dicatat.</p>
</div>

<div class="card p-3 p-md-4">
    <form action="{{ route('bahan-makanan.store') }}" method="POST">
        @csrf
        @include('bahan_makanan._form')
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Simpan</button>
            <a href="{{ route('bahan-makanan.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
