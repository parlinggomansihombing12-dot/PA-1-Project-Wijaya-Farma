@extends('layouts.admin_master')
@section('title', 'Tambah Kategori - Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #2C3E50;">➕ Tambah Kategori Baru</h2>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            <!-- PENTING: Tambahkan enctype="multipart/form-data" untuk upload gambar -->
            <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" class="form-control" required placeholder="Contoh: Obat Kepala">
                </div>

                <!-- INPUT ICON BARU -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Icon Kategori (Gambar)</label>
                    <input type="file" name="icon" class="form-control" accept="image/*">
                    <small class="text-muted">Gunakan gambar transparan (.png atau .svg) agar tampilan lebih profesional.</small>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Contoh: Obat untuk meredakan sakit kepala dan pusing."></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2">💾 Simpan Kategori</button>
            </form>
        </div>
    </div>
@endsection