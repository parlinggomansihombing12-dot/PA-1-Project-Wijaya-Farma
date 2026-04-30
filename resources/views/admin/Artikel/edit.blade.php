@extends('layouts.admin_master')
@section('title', 'Edit Artikel - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #2C3E50;">✏️ Edit Artikel</h2>
    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary fw-bold">&larr; Kembali</a>
</div>

@if($errors->any())
    <div class="alert alert-danger shadow-sm rounded-3">
        <ul class="mb-0 ps-3">@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
    </div>
@endif

<div class="card border-0 shadow-sm" style="max-width: 800px; border-radius: 15px;">
    <div class="card-body p-4 p-md-5">
        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-heading me-2"></i>Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control form-control-lg border-2 shadow-none" style="border-radius: 10px;" value="{{ old('judul', $artikel->judul) }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-tags me-2"></i>Kategori Artikel <span class="text-danger">*</span></label>
                <select name="kategori_artikel" class="form-select border-2 shadow-none" style="border-radius: 10px;" required>
                    <option value="Kesehatan Umum" {{ old('kategori_artikel', $artikel->kategori_artikel) == 'Kesehatan Umum' ? 'selected' : '' }}>Kesehatan Umum</option>
                    <option value="Edukasi" {{ old('kategori_artikel', $artikel->kategori_artikel) == 'Edukasi' ? 'selected' : '' }}>Edukasi & Pencegahan</option>
                    <option value="Gaya Hidup Sehat" {{ old('kategori_artikel', $artikel->kategori_artikel) == 'Gaya Hidup Sehat' ? 'selected' : '' }}>Gaya Hidup Sehat</option>
                    <option value="Informasi Obat" {{ old('kategori_artikel', $artikel->kategori_artikel) == 'Informasi Obat' ? 'selected' : '' }}>Informasi Obat</option>
                </select>
            </div>

            <!-- FITUR GANTI FOTO DENGAN PREVIEW INSTAN -->
            <div class="mb-4 p-4 rounded-3" style="background-color: #f8f9fa; border: 1px dashed #ced4da;">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-image me-2"></i>Ganti Foto Cover (Opsional)</label>
                
                <div class="d-flex flex-column flex-sm-row align-items-start gap-4 mt-2">
                    
                    <!-- Area Foto Lama / Placeholder -->
                    <div class="flex-shrink-0 text-center" id="oldPhotoContainer">
                        <p class="small text-muted mb-1">Foto Saat Ini:</p>
                        @if($artikel->foto)
                            <img src="{{ asset('images/artikel/' . $artikel->foto) }}" alt="Thumbnail Lama" class="img-thumbnail shadow-sm" style="max-width: 150px; height: 100px; object-fit: cover; border-radius: 8px;">
                        @else
                            <div class="text-muted" style="width: 150px; height: 100px; background: #e9ecef; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                <i class="fas fa-camera fs-3 mb-1"></i><span class="small">Belum Ada Foto</span>
                            </div>
                        @endif
                    </div>

                    <!-- Area Input & Preview Baru -->
                    <div class="flex-grow-1 w-100">
                        <input type="file" name="foto" id="inputFoto" class="form-control border-2 shadow-none" accept="image/*" onchange="previewImage()">
                        <small class="text-muted mt-2 d-block">Biarkan kosong jika tidak ingin mengganti foto. Max 3MB.</small>
                        
                        <!-- Tempat Preview Foto Baru -->
                        <div id="previewContainer" class="mt-3 text-center" style="display: none;">
                            <p class="small text-success fw-bold mb-1">Preview Foto Baru:</p>
                            <img id="imgPreview" src="" class="img-thumbnail shadow-sm" style="max-height: 120px; border-radius: 8px;">
                        </div>
                    </div>

                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #1ABC9C;"><i class="fas fa-align-left me-2"></i>Isi Konten Artikel <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control border-2 shadow-none" rows="12" style="border-radius: 10px;" required>{{ old('konten', $artikel->konten) }}</textarea>
            </div>

            <div class="mb-5">
                <label class="form-label fw-bold text-secondary"><i class="fas fa-user-edit me-2"></i>Nama Penulis</label>
                <input type="text" name="penulis" class="form-control border-2 shadow-none" style="border-radius: 10px;" value="{{ old('penulis', $artikel->penulis) }}">
            </div>

            <button type="submit" class="btn w-100 fw-bold py-3 fs-5" style="background-color: #27ae60; color: white; border-radius: 10px; transition: 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 20px rgba(39, 174, 96, 0.3)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                💾 Simpan Perubahan Artikel
            </button>
        </form>
    </div>
</div>

<!-- SCRIPT UNTUK PREVIEW FOTO BARU -->
<script>
    function previewImage() {
        const image = document.querySelector('#inputFoto');
        const imgPreview = document.querySelector('#imgPreview');
        const container = document.querySelector('#previewContainer');
        const oldContainer = document.querySelector('#oldPhotoContainer');

        if(image.files && image.files[0]) {
            container.style.display = 'block';
            if(oldContainer) oldContainer.style.opacity = '0.3'; // Buramkan foto lama
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        } else {
            container.style.display = 'none';
            if(oldContainer) oldContainer.style.opacity = '1';
        }
    }
</script>
@endsection