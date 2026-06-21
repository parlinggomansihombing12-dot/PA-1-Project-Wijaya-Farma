@extends('layouts.admin_master')
@section('title', 'Tambah Kategori - Admin Panel')

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
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
        --shadow-lg: 0 8px 25px rgba(0,0,0,0.08);
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
        margin-bottom: 25px;
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
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.75rem;
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
        border-radius: 20px;
        border: 1px solid #eef2f6;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        max-width: 600px;
        margin: 0 auto;
    }

    .card-header-form {
        background: linear-gradient(135deg, #f8fafc, white);
        padding: 18px 25px;
        border-bottom: 1px solid #eef2f6;
    }

    .card-header-form h5 {
        font-size: 0.95rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .card-header-form h5 i {
        color: var(--primary);
    }

    .card-body-form {
        padding: 25px;
    }

    /* ================= FORM ELEMENTS ================= */
    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
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
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.8rem;
        transition: all 0.2s;
        font-family: 'Inter', sans-serif;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    textarea.form-control-custom {
        resize: vertical;
        min-height: 80px;
    }

    /* File Input */
    .file-input {
        padding: 8px 12px;
        font-size: 0.75rem;
    }

    .form-text-custom {
        font-size: 0.6rem;
        color: var(--text-muted);
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-text-custom i {
        color: var(--primary);
        font-size: 0.6rem;
    }

    /* ================= TOMBOL SIMPAN ================= */
    .btn-submit {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 10px;
        border-radius: 40px;
        font-weight: 800;
        font-size: 0.8rem;
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
        box-shadow: 0 5px 15px rgba(26,188,156,0.3);
        gap: 12px;
    }

    /* ================= ALERT ERROR ================= */
    .alert-error {
        background: #fee2e2;
        border-left: 3px solid #ef4444;
        border-radius: 12px;
        padding: 12px 18px;
        margin-bottom: 20px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert-error ul {
        margin: 0;
        padding-left: 20px;
        color: #991b1b;
        font-size: 0.75rem;
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
            padding: 20px;
        }
        .btn-back {
            padding: 6px 16px;
            font-size: 0.7rem;
        }
        .btn-submit {
            padding: 9px;
            font-size: 0.75rem;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <h2 class="page-title">
            <i class="fas fa-plus-circle"></i> Tambah Kategori Baru
        </h2>
        <a href="{{ route('admin.kategori.index') }}" class="btn-back">
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
        <div class="card-header-form">
            <h5>
                <i class="fas fa-folder-open"></i> Form Tambah Kategori
            </h5>
        </div>
        <div class="card-body-form">
            <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Nama Kategori -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-tag"></i> Nama Kategori <span class="required">*</span>
                    </label>
                    <input type="text" name="nama_kategori" class="form-control-custom" 
                           placeholder="Contoh: Obat Kepala" required>
                </div>

                <!-- Foto Kategori -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-image"></i> Foto Kategori <span class="text-muted">(Opsional)</span>
                    </label>
                    <input type="file" name="foto" class="form-control-custom file-input" accept="image/*">
                    <div class="form-text-custom">
                        <i class="fas fa-info-circle"></i> 
                        Gunakan gambar transparan (.png) agar tampilan lebih profesional. Maksimal 2MB.
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-align-left"></i> Deskripsi <span class="text-muted">(Opsional)</span>
                    </label>
                    <textarea name="deskripsi" class="form-control-custom" rows="3" 
                            placeholder="Contoh: Obat untuk meredakan sakit kepala dan pusing."></textarea>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Simpan Kategori Baru
                </button>
            </form>
        </div>
    </div>

</div>
@endsection