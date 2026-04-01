@extends('layouts.admin_master')
@section('title', 'Tambah Produk Baru')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">➕ Tambah Produk Baru</h2>
    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary fw-bold">← Kembali</a>
</div>

<div class="card border-0 shadow-sm" style="max-width: 800px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Obat / Produk <span class="text-danger">*</span></label>
                <input type="text" name="nama_obat" class="form-control" required placeholder="Contoh: Paracetamol 500mg">
            </div>

            <!-- INPUT KATEGORI BARU -->
            <div class="mb-3">
                <label class="form-label fw-bold">Pilih Kategori <span class="text-danger">*</span></label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Harga (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="harga" class="form-control" required placeholder="Contoh: 15000">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Stok Awal <span class="text-danger">*</span></label>
                    <input type="number" name="stok" class="form-control" required placeholder="Contoh: 50">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Upload Foto Produk</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">Format yang diizinkan: JPG, PNG, JPEG. (Maksimal 2MB).</small>
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold py-2">💾 Simpan Produk Baru</button>
        </form>
    </div>
</div>
@endsection