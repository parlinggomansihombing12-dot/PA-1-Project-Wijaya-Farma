@extends('layouts.admin_master')
@section('title', 'Edit Artikel - Admin Panel')

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

    /* Foto Lama & Baru */
    .foto-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 10px;
    }

    .foto-lama {
        flex: 1;
        text-align: center;
        padding: 12px;
        background: white;
        border-radius: 12px;
        border: 1px solid #eef2f6;
    }

    .foto-lama p {
        font-size: 0.6rem;
        font-weight: 700;
        color: var(--text-muted);
        margin-bottom: 8px;
    }

    .foto-lama-img {
        max-width: 120px;
        max-height: 80px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: var(--shadow-sm);
    }

    .foto-lama-placeholder {
        width: 120px;
        height: 80px;
        background: #f1f5f9;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .foto-baru {
        flex: 2;
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

    /* Preview Foto Baru */
    .preview-container {
        margin-top: 12px;
        text-align: center;
        padding: 10px;
        background: white;
        border-radius: 10px;
        border: 1px solid #eef2f6;
    }

    .preview-image {
        max-height: 100px;
        border-radius: 8px;
    }

    /* ================= TEXTAREA ================= */
    textarea.form-control-custom {
        resize: vertical;
        min-height: 200px;
    }

    /* ================= TOMBOL UPDATE ================= */
    .btn-update {
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

    .btn-update:hover {
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
        .foto-grid {
            flex-direction: column;
        }
        .foto-lama-img,
        .foto-lama-placeholder {
            width: 100px;
            height: 70px;
        }
        .btn-update {
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
            <i class="fas fa-edit"></i> Edit Artikel
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
            <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- JUDUL -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-heading"></i> Judul Artikel <span class="required">*</span>
                    </label>
                    <input type="text" name="judul" class="form-control-custom" 
                        value="{{ old('judul', $artikel->judul) }}" 
                        placeholder="Masukkan judul artikel..." required>
                </div>

                <!-- KATEGORI -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-tags"></i> Kategori Artikel <span class="required">*</span>
                    </label>
                    <select name="kategori_artikel" class="form-control-custom" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        @forelse($kategori_artikel as $kat)
                            <option value="{{ $kat->nama_kategori }}" {{ old('kategori_artikel', $artikel->kategori_artikel) == $kat->nama_kategori ? 'selected' : '' }}>
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
                            <i class="fas fa-image"></i> Ganti Foto Cover (Opsional)
                        </label>
                        
                        <div class="foto-grid">
                            <!-- Foto Lama -->
                            <div class="foto-lama">
                                <p><i class="fas fa-camera me-1"></i> Foto Saat Ini</p>
                                @if($artikel->foto)
                                    <img src="{{ asset('images/artikel/' . $artikel->foto) }}" class="foto-lama-img" alt="Foto Lama">
                                @else
                                    <div class="foto-lama-placeholder">
                                        <i class="fas fa-image fa-2x text-muted"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Foto Baru -->
                            <div class="foto-baru">
                                <input type="file" name="foto" id="inputFoto" class="file-input" accept="image/*" onchange="previewImage()">
                                <div class="upload-hint">
                                    <i class="fas fa-info-circle me-1"></i> Format: JPG, PNG, JPEG. Maksimal 2MB. Kosongkan jika tidak ingin mengganti.
                                </div>
                                
                                <!-- Preview Foto Baru -->
                                <div id="previewContainer" class="preview-container" style="display: none;">
                                    <p class="small text-success fw-bold mb-1">Preview Foto Baru:</p>
                                    <img id="imgPreview" src="" class="preview-image" alt="Preview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KONTEN -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-align-left"></i> Isi Konten Artikel <span class="required">*</span>
                    </label>
                    <textarea name="konten" class="form-control-custom" rows="12" 
                    placeholder="Tulis isi artikel kesehatan Anda di sini..." required>{{ old('konten', $artikel->konten) }}</textarea>
                </div>

                <!-- PENULIS -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user-edit"></i> Nama Penulis
                    </label>
                    <input type="text" name="penulis" class="form-control-custom" 
                        value="{{ old('penulis', $artikel->penulis) }}" 
                        placeholder="Nama penulis artikel">
                </div>

                <!-- TOMBOL UPDATE -->
                <button type="submit" class="btn-update">
                    <i class="fas fa-save"></i> Simpan Perubahan
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