@extends('layouts.admin_master')
@section('title', 'Tambah Produk Baru')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark"><i class="fas fa-plus-circle me-2 text-primary"></i>Tambah Produk Baru</h2>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary shadow-sm px-4">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- BAGIAN UNTUK MELIHAT ERROR --}}
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4" style="max-width: 900px;">
        <div class="card-body p-5">
            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <!-- Nama Produk -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold text-muted uppercase text-[12px]">Nama Obat / Produk <span class="text-danger">*</span></label>
                        <input type="text" name="nama_obat" class="form-control form-control-lg rounded-3 @error('nama_obat') is-invalid @enderror" 
                               required placeholder="Contoh: Paracetamol 500mg" value="{{ old('nama_obat') }}">
                    </div>

                    <!-- Kategori -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold text-muted">Pilih Kategori <span class="text-danger">*</span></label>
                        <select name="kategori_id" class="form-select form-select-lg rounded-3 @error('kategori_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Harga & Stok -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Harga (Rp) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">Rp</span>
                            <input type="number" name="harga" class="form-control form-control-lg border-start-0 rounded-end-3" 
                                   required placeholder="15000" value="{{ old('harga') }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-muted">Stok Awal <span class="text-danger">*</span></label>
                        <input type="number" name="stok" class="form-control form-control-lg rounded-3" 
                               required placeholder="50" value="{{ old('stok') }}">
                    </div>

                    <!-- Foto -->
                    <div class="col-md-12 mb-4">
                        <label class="form-label fw-bold text-muted">Upload Foto Produk</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <div class="form-text text-muted">Format: JPG, PNG, JPEG. (Maksimal 2MB).</div>
                    </div>
                </div>

                <div class="mb-3">
                     <label class="form-label fw-bold">Deskripsi Produk <span class="text-danger">*</span></label>
                     <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan kegunaan, dosis, atau efek samping obat..." required></textarea>
                     <small class="text-muted">Gunakan tombol Enter untuk baris baru agar rapi di halaman pengunjung.</small>
                </div>

                <hr class="my-4 opacity-50">

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm rounded-pill py-3">
                    <i class="fas fa-save me-2"></i> Simpan Produk Baru
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    /* Agar tampilan lebih profesional */
    .form-control:focus, .form-select:focus {
        border-color: #1ABC9C;
        box-shadow: 0 0 0 0.25rem rgba(26, 188, 156, 0.1);
    }
    .card { background-color: #ffffff; }
    body { background-color: #f8fafc; }
</style>
@endsection