<!-- 1. Panggil Template Induk Admin -->
@extends('layouts.admin_master')

<!-- 2. Beri Judul Halaman -->
@section('title', 'Tambah Produk Baru - Admin Panel')

<!-- 3. Masukkan Konten Form Tambah -->
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">➕ Tambah Produk Baru</h2>
        <!-- Tombol Kembali ke Daftar Produk -->
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
    </div>

    <!-- Menampilkan pesan error jika ada isian yang salah/kosong -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            
            <!-- Form Tambah diarahkan ke Controller dengan method POST -->
            <!-- WAJIB ADA enctype agar bisa kirim gambar -->
            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Input Nama Obat -->
                <div class="mb-3">
                    <label for="nama_obat" class="form-label fw-bold">Nama Obat / Produk <span class="text-danger">*</span></label>
                    <input type="text" name="nama_obat" id="nama_obat" class="form-control" value="{{ old('nama_obat') }}" placeholder="Contoh: Paracetamol 500mg" required>
                </div>

                <div class="row">
                    <!-- Input Harga -->
                    <div class="col-md-6 mb-3">
                        <label for="harga" class="form-label fw-bold">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" placeholder="Contoh: 15000" required>
                    </div>

                    <!-- Input Stok -->
                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label fw-bold">Stok Awal <span class="text-danger">*</span></label>
                        <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" placeholder="Contoh: 50" required>
                    </div>
                </div>

                <!-- Input Upload Foto Baru -->
                <div class="mb-4">
                    <label for="foto" class="form-label fw-bold">Upload Foto Produk</label>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Format yang diizinkan: JPG, PNG, JPEG. (Maksimal 2MB).</small>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2">💾 Simpan Produk Baru</button>
                
            </form>
            
        </div>
    </div>
@endsection