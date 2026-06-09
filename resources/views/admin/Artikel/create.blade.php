@extends('layouts.admin_master')
@section('title', 'Tambah Artikel Baru - Admin Panel')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
    }

    .content {
        padding: 15px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
    }

    /* ================= HEADER ================= */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .page-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .page-title i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    /* ================= TOMBOL KEMBALI ================= */
    .btn-back {
        background: white;
        color: var(--text-muted);
        border: 1px solid #e2e8f0;
        padding: 7px 18px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.7rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-back:hover {
        background: #f1f5f9;
        color: var(--dark);
        gap: 10px;
    }

    /* ================= CARD FORM ================= */
    .card-form {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef2f6;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        max-width: 800px;
        margin: 0 auto;
    }

    .card-body-form {
        padding: 22px;
    }

    /* ================= FORM ELEMENTS ================= */
    .form-group {
        margin-bottom: 18px;
    }

    .form-label {
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }

    .form-label i {
        margin-right: 6px;
        color: var(--primary);
    }

    .form-label .required {
        color: #ef4444;
        margin-left: 3px;
    }

    .form-control-custom {
        width: 100%;
        padding: 9px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.75rem;
        transition: all 0.2s;
        font-family: 'Inter', sans-serif;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    select.form-control-custom {
        cursor: pointer;
    }

    /* ================= UPLOAD FOTO ================= */
    .upload-area {
        background: #f8fafc;
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 15px;
        transition: all 0.2s;
    }

    .upload-area:hover {
        border-color: var(--primary);
        background: #f0fdf4;
    }

    .upload-label {
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
        display: block;
    }

    .upload-label i {
        color: var(--primary);
    }

    .file-input {
        width: 100%;
        padding: 8px 0;
        font-size: 0.7rem;
    }

    .upload-hint {
        font-size: 0.6rem;
        color: var(--text-muted);
        margin-top: 8px;
    }

    /* Preview Foto */
    .preview-container {
        margin-top: 12px;
        text-align: center;
        padding: 10px;
        background: white;
        border-radius: 10px;
    }

    .preview-image {
        max-height: 150px;
        border-radius: 10px;
        box-shadow: var(--shadow-sm);
    }

    /* ================= TEXTAREA ================= */
    textarea.form-control-custom {
        resize: vertical;
        min-height: 200px;
    }

    /* ================= TOMBOL SUBMIT ================= */
    .btn-submit {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 10px;
        border-radius: 40px;
        font-weight: 800;
        font-size: 0.75rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(26,188,156,0.3);
        gap: 10px;
    }

    /* ================= ALERT ERROR ================= */
    .alert-error {
        background: #fee2e2;
        border-left: 3px solid #ef4444;
        border-radius: 10px;
        padding: 10px 16px;
        margin-bottom: 20px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert-error ul {
        margin: 0;
        padding-left: 18px;
        color: #991b1b;
        font-size: 0.7rem;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content {
            padding: 10px;
        }
        .page-title {
            font-size: 1rem;
        }
        .card-body-form {
            padding: 18px;
        }
        .btn-back {
            padding: 6px 14px;
            font-size: 0.65rem;
        }
        .btn-submit {
            padding: 9px;
            font-size: 0.7rem;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <h2 class="page-title">
            <i class="fas fa-pen-fancy"></i> Tulis Artikel Baru
        </h2>
        <a href="{{ route('admin.artikel.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- ERROR MESSAGES -->
    @if($errors->any())
    <div class="alert-error">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- CARD FORM -->
    <div class="card-form">
        <div class="card-body-form">
            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- JUDUL -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-heading"></i> Judul Artikel <span class="required">*</span>
                    </label>
                    <input type="text" name="judul" class="form-control-custom" 
                           value="{{ old('judul') }}" 
                           placeholder="Masukkan judul yang menarik..." required>
                </div>

                <!-- KATEGORI -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-tags"></i> Kategori Artikel <span class="required">*</span>
                    </label>
                    <select name="kategori_artikel" class="form-control-custom" required>
                        <option value="" disabled {{ old('kategori_artikel') ? '' : 'selected' }}>-- Pilih Kategori --</option>
                        @forelse($kategori_artikel as $kat)
                            <option value="{{ $kat->nama_kategori }}" {{ old('kategori_artikel') == $kat->nama_kategori ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @empty
                            <option value="" disabled>Belum ada kategori! Buat dulu di halaman sebelumnya.</option>
                        @endforelse
                    </select>
                </div>

                <!-- UPLOAD FOTO -->
                <div class="form-group">
                    <div class="upload-area">
                        <label class="upload-label">
                            <i class="fas fa-image"></i> Foto Cover Artikel
                        </label>
                        <input type="file" name="foto" id="inputFoto" class="file-input" accept="image/*" onchange="previewImage()">
                        <div class="upload-hint">
                            <i class="fas fa-info-circle me-1"></i> Format: JPG, PNG, JPEG. Maksimal 2MB. Disarankan rasio 16:9
                        </div>
                        
                        <!-- Preview Foto -->
                        <div id="previewContainer" class="preview-container" style="display: none;">
                            <img id="imgPreview" src="" class="preview-image" alt="Preview">
                        </div>
                    </div>
                </div>

                <!-- KONTEN -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-align-left"></i> Isi Konten Artikel <span class="required">*</span>
                    </label>
                    <textarea name="konten" class="form-control-custom" rows="12" 
                              placeholder="Ketik isi artikel kesehatan Anda di sini..." required>{{ old('konten') }}</textarea>
                </div>

                <!-- PENULIS -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user-edit"></i> Nama Penulis
                    </label>
                    <input type="text" name="penulis" class="form-control-custom" 
                           value="{{ old('penulis', 'Admin Wijaya Farma') }}" 
                           placeholder="Nama penulis artikel">
                </div>

                <!-- TOMBOL SUBMIT -->
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Terbitkan Artikel
                </button>
            </form>
        </div>
    </div>

</div>

<script>
    function previewImage() {
        const image = document.querySelector('#inputFoto');
        const imgPreview = document.querySelector('#imgPreview');
        const container = document.querySelector('#previewContainer');

        if(image.files && image.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                container.style.display = 'block';
            }
            reader.readAsDataURL(image.files[0]);
        } else {
            container.style.display = 'none';
            imgPreview.src = '';
        }
    }
</script>
@endsection