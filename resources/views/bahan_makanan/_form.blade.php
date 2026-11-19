@php($item = $bahanMakanan ?? null)

<div class="mb-3">
    <label for="nama" class="form-label fw-semibold">Nama bahan makanan</label>
    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $item?->nama) }}" maxlength="100" placeholder="Contoh: Beras" required>
    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="kategori" class="form-label fw-semibold">Kategori</label>
    <input type="text" name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori', $item?->kategori) }}" maxlength="50" placeholder="Contoh: Bahan Pokok" required>
    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="row g-3">
    <div class="col-md-6 mb-3">
        <label for="jumlah" class="form-label fw-semibold">Jumlah stok</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $item?->jumlah ?? 0) }}" min="0" max="99999999.99" step="0.01" required>
        @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="satuan" class="form-label fw-semibold">Satuan</label>
        <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan', $item?->satuan) }}" maxlength="20" placeholder="kg, butir, bungkus" required>
        @error('satuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<div class="mb-4">
    <label for="tanggal_kedaluwarsa" class="form-label fw-semibold">Tanggal kedaluwarsa <span class="text-secondary fw-normal">(opsional)</span></label>
    <input type="date" name="tanggal_kedaluwarsa" id="tanggal_kedaluwarsa" class="form-control @error('tanggal_kedaluwarsa') is-invalid @enderror" value="{{ old('tanggal_kedaluwarsa', $item?->tanggal_kedaluwarsa?->format('Y-m-d')) }}">
    @error('tanggal_kedaluwarsa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    <div class="form-text">Kosongkan jika tanggal kedaluwarsa tidak diketahui atau tidak diperlukan.</div>
</div>
