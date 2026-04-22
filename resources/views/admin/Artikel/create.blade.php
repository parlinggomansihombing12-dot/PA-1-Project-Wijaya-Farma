@extends('layouts.admin_master')
@section('title', 'Tambah Artikel Baru - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">➕ Tulis Artikel Baru</h2>
    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="alert alert-danger shadow-sm rounded-3">
        <ul class="mb-0 ps-3">
            @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
    </div>
@endif

<div class="card border-0 shadow-sm" style="max-width: 800px; border-radius: 15px;">
    <div class="card-body p-4 p-md-5">
        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-heading me-2"></i>Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control form-control-lg border-2 shadow-none" value="{{ old('judul') }}" placeholder="Masukkan judul yang menarik..." style="border-radius: 10px;" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-tags me-2"></i>Kategori Artikel <span class="text-danger">*</span></label>
                <select name="kategori_artikel" class="form-select border-2 shadow-none" style="border-radius: 10px;" required>
                    <option value="" disabled selected>Pilih Kategori...</option>
                    <option value="Kesehatan Umum" {{ old('kategori_artikel') == 'Kesehatan Umum' ? 'selected' : '' }}>Kesehatan Umum</option>
                    <option value="Edukasi" {{ old('kategori_artikel') == 'Edukasi' ? 'selected' : '' }}>Edukasi & Pencegahan</option>
                    <option value="Gaya Hidup Sehat" {{ old('kategori_artikel') == 'Gaya Hidup Sehat' ? 'selected' : '' }}>Gaya Hidup Sehat</option>
                    <option value="Informasi Obat" {{ old('kategori_artikel') == 'Informasi Obat' ? 'selected' : '' }}>Informasi Obat</option>
                </select>
            </div>

            <!-- FITUR UPLOAD DENGAN PREVIEW INSTAN -->
            <div class="mb-4 p-4 rounded-3" style="background-color: #f8fcfb; border: 2px dashed #1ABC9C;">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-image me-2"></i>Foto Cover Artikel / Thumbnail</label>
                <input type="file" name="foto" id="inputFoto" class="form-control border-2 shadow-none" accept="image/*" onchange="previewImage()">
                <small class="text-muted mt-2 d-block">Maksimal 3MB. Disarankan rasio landscape (16:9).</small>
                
                <!-- Kotak Preview (Awalnya disembunyikan) -->
                <div id="previewContainer" class="mt-3 text-center" style="display: none;">
                    <p class="small text-success fw-bold mb-1">Preview Foto:</p>
                    <img id="imgPreview" src="" class="img-thumbnail shadow-sm" style="max-height: 200px; border-radius: 10px;">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-align-left me-2"></i>Isi Konten Artikel <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control border-2 shadow-none" rows="12" placeholder="Ketik isi artikel kesehatan Anda di sini..." style="border-radius: 10px;" required>{{ old('konten') }}</textarea>
            </div>

            <div class="mb-5">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-user-edit me-2"></i>Nama Penulis</label>
                <input type="text" name="penulis" class="form-control border-2 shadow-none" value="{{ old('penulis') ?? 'Admin Wijaya Farma' }}" style="border-radius: 10px;">
            </div>

            <button type="submit" class="btn w-100 fw-bold py-3 fs-5 mt-3" style="background-color: #1ABC9C; color: white; border-radius: 10px; transition: 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 20px rgba(26,188,156,0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                🚀 Terbitkan Artikel
            </button>
        </form>
    </div>
</div>

<!-- SCRIPT UNTUK PREVIEW FOTO -->
<script>
    function previewImage() {
        const image = document.querySelector('#inputFoto');
        const imgPreview = document.querySelector('#imgPreview');
        const container = document.querySelector('#previewContainer');

        if(image.files && image.files[0]) {
            container.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        } else {
            container.style.display = 'none';
        }
    }
</script>
@endsection