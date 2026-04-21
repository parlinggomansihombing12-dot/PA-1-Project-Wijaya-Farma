@extends('layouts.admin_master')
@section('title', 'Edit Artikel - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">✏️ Edit Artikel</h2>
    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul></div>
@endif

<div class="card border-0 shadow-sm" style="max-width: 800px;">
    <div class="card-body p-4 p-md-5">
        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-heading me-2"></i>Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control form-control-lg border-2" value="{{ old('judul', $artikel->judul) }}" required>
            </div>

            <!-- DROPDOWN KATEGORI ARTIKEL (Otomatis Terpilih Sesuai Database) -->
            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-tags me-2"></i>Kategori Artikel <span class="text-danger">*</span></label>
                <select name="kategori_artikel" class="form-select border-2" required>
                    <option value="Kesehatan Umum" {{ $artikel->kategori_artikel == 'Kesehatan Umum' ? 'selected' : '' }}>Kesehatan Umum</option>
                    <option value="Edukasi" {{ $artikel->kategori_artikel == 'Edukasi' ? 'selected' : '' }}>Edukasi & Pencegahan</option>
                    <option value="Gaya Hidup Sehat" {{ $artikel->kategori_artikel == 'Gaya Hidup Sehat' ? 'selected' : '' }}>Gaya Hidup Sehat</option>
                    <option value="Informasi Obat" {{ $artikel->kategori_artikel == 'Informasi Obat' ? 'selected' : '' }}>Informasi Obat</option>
                </select>
            </div>

            <div class="mb-4 p-3 rounded" style="background-color: #f8f9fa; border: 1px dashed #ced4da;">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-image me-2"></i>Ganti Foto Cover (Opsional)</label>
                <div class="d-flex flex-column flex-sm-row align-items-start gap-4 mt-2">
                    @if($artikel->foto)
                        <div class="flex-shrink-0 text-center">
                            <p class="small text-muted mb-1">Foto Saat Ini:</p>
                            <img src="{{ asset('images/artikel/' . $artikel->foto) }}" class="img-thumbnail shadow-sm" style="max-width: 150px; height: 100px; object-fit: cover;">
                        </div>
                    @else
                        <div class="flex-shrink-0 text-center text-muted" style="width: 150px; height: 100px; background: #e9ecef; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                            <i class="fas fa-camera fs-3 mb-1"></i><span class="small">Belum Ada Foto</span>
                        </div>
                    @endif
                    <div class="flex-grow-1 w-100">
                        <input type="file" name="foto" class="form-control border-2" accept="image/*">
                        <small class="text-muted mt-2 d-block">Biarkan kosong jika tidak ingin mengganti foto.<br>Max 3MB.</small>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-align-left me-2"></i>Isi Konten Artikel <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control border-2" rows="12" required>{{ old('konten', $artikel->konten) }}</textarea>
            </div>

            <div class="mb-5">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-user-edit me-2"></i>Nama Penulis</label>
                <input type="text" name="penulis" class="form-control border-2" value="{{ old('penulis', $artikel->penulis) }}">
            </div>

            <button type="submit" class="btn w-100 fw-bold py-3 fs-5" style="background-color: #27ae60; color: white; box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);">
                💾 Simpan Perubahan Artikel
            </button>
        </form>
    </div>
</div>
@endsection