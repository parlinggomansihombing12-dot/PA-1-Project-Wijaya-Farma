@extends('layouts.admin_master')
@section('title', 'Tambah Artikel Baru - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">➕ Tulis Artikel Baru</h2>
    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul></div>
@endif

<div class="card border-0 shadow-sm" style="max-width: 800px;">
    <div class="card-body p-4 p-md-5">
        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-heading me-2"></i>Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control form-control-lg border-2" value="{{ old('judul') }}" placeholder="Masukkan judul yang menarik..." required>
            </div>

            <!-- DROPDOWN KATEGORI ARTIKEL -->
            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-tags me-2"></i>Kategori Artikel <span class="text-danger">*</span></label>
                <select name="kategori_artikel" class="form-select border-2" required>
                    <option value="" disabled selected>Pilih Kategori...</option>
                    <option value="Kesehatan Umum">Kesehatan Umum</option>
                    <option value="Edukasi">Edukasi & Pencegahan</option>
                    <option value="Gaya Hidup Sehat">Gaya Hidup Sehat</option>
                    <option value="Informasi Obat">Informasi Obat</option>
                </select>
            </div>

            <div class="mb-4 p-3 rounded" style="background-color: #f8f9fa; border: 1px dashed #ced4da;">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-image me-2"></i>Foto Cover Artikel / Thumbnail</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted mt-2 d-block">Sangat disarankan mengunggah foto landscape (mendatar) dengan ukuran di bawah 3MB agar tampilan web tidak berat.</small>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-align-left me-2"></i>Isi Konten Artikel <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control border-2" rows="12" placeholder="Ketik isi artikel kesehatan Anda di sini..." required>{{ old('konten') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-user-edit me-2"></i>Nama Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis') ?? 'Admin Wijaya Farma' }}">
            </div>

            <button type="submit" class="btn w-100 fw-bold py-3 fs-5 mt-3" style="background-color: #1ABC9C; color: white;">🚀 Terbitkan Artikel</button>
        </form>
    </div>
</div>
@endsection