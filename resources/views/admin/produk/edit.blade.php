@extends('layouts.admin_master')
@section('title', 'Edit Produk - ' . $produk->nama_obat)

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
    }

    .content {
        padding: 20px;
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
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-title i {
        color: var(--primary);
        font-size: 1.3rem;
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
        box-shadow: var(--shadow-sm);
        max-width: 800px;
        margin: 0 auto;
    }

    .card-header-form {
        background: linear-gradient(135deg, #f8fafc, white);
        padding: 20px 25px;
        border-bottom: 1px solid #eef2f6;
    }

    .card-header-form h5 {
        font-size: 1rem;
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

    /* ================= PREVIEW FOTO ================= */
    .preview-container {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 20px;
        padding: 15px;
        background: #f8fafc;
        border-radius: 16px;
    }

    .preview-image {
        width: 100px;
        height: 100px;
        border-radius: 16px;
        object-fit: cover;
        border: 2px solid #e2e8f0;
        box-shadow: var(--shadow-sm);
    }

    .preview-placeholder {
        width: 100px;
        height: 100px;
        background: #f1f5f9;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #e2e8f0;
    }

    .preview-placeholder i {
        font-size: 2rem;
        color: #cbd5e1;
    }

    .preview-info p {
        margin: 0;
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .preview-info small {
        font-size: 0.65rem;
        color: var(--primary);
    }

    /* ================= FORM ELEMENTS ================= */
    .form-group {
        margin-bottom: 20px;
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

    .form-label .required {
        color: #ef4444;
        margin-left: 3px;
    }

    .form-control-custom {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.85rem;
        transition: all 0.2s;
        font-family: 'Inter', sans-serif;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    /* Input Group (Harga) */
    .input-group-custom {
        display: flex;
        align-items: stretch;
    }

    .input-group-text-custom {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-right: none;
        padding: 0 14px;
        border-radius: 12px 0 0 12px;
        display: flex;
        align-items: center;
        font-weight: 700;
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .input-group-custom .form-control-custom {
        border-radius: 0 12px 12px 0;
        border-left: none;
    }

    /* Row Dua Kolom */
    .row-custom {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .col-custom {
        flex: 1;
        min-width: 200px;
    }

    /* File Input */
    .file-input {
        padding: 8px 12px;
        font-size: 0.8rem;
    }

    .form-text-custom {
        font-size: 0.65rem;
        color: var(--text-muted);
        margin-top: 5px;
    }

    /* Textarea */
    .textarea-custom {
        width: 100%;
        padding: 12px 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.85rem;
        font-family: 'Inter', sans-serif;
        transition: all 0.2s;
        resize: vertical;
    }

    .textarea-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    /* Divider */
    .divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        margin: 20px 0;
    }

    /* ================= TOMBOL UPDATE ================= */
    .btn-update {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 12px;
        border-radius: 50px;
        font-weight: 800;
        font-size: 0.85rem;
        width: 100%;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26,188,156,0.3);
        gap: 14px;
    }

    /* ================= ALERT ERROR ================= */
    .alert-error {
        background: #fee2e2;
        border-left: 4px solid #ef4444;
        border-radius: 12px;
        padding: 12px 18px;
        margin-bottom: 20px;
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
            padding: 15px;
        }
        .page-title {
            font-size: 1.1rem;
        }
        .card-body-form {
            padding: 20px;
        }
        .row-custom {
            flex-direction: column;
            gap: 15px;
        }
        .btn-back {
            padding: 6px 16px;
            font-size: 0.7rem;
        }
        .preview-container {
            flex-direction: column;
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <h2 class="page-title">
            <i class="fas fa-edit"></i> Edit Produk
        </h2>
        <a href="{{ route('admin.produk.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- ERROR MESSAGES -->
    @if ($errors->any())
    <div class="alert-error">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- CARD FORM -->
    <div class="card-form">
        <div class="card-header-form">
            <h5>
                <i class="fas fa-pen-fancy"></i> Form Edit Produk
            </h5>
        </div>
        <div class="card-body-form">
            <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- PREVIEW FOTO SAAT INI -->
                <div class="preview-container">
                    @if($produk->foto)
                        <img src="{{ asset('images/produk/' . $produk->foto) }}" class="preview-image" alt="Foto Produk">
                    @else
                        <div class="preview-placeholder">
                            <i class="fas fa-camera"></i>
                        </div>
                    @endif
                    <div class="preview-info">
                        <p><i class="fas fa-image me-1"></i> Foto Saat Ini</p>
                        <small>Upload foto baru jika ingin mengganti</small>
                    </div>
                </div>
                
                <!-- Nama Produk -->
                <div class="form-group">
                    <label class="form-label">Nama Obat / Produk <span class="required">*</span></label>
                    <input type="text" name="nama_obat" class="form-control-custom @error('nama_obat') is-invalid @enderror" 
                           required placeholder="Contoh: Paracetamol 500mg" value="{{ old('nama_obat', $produk->nama_obat) }}">
                </div>

                <!-- Kategori -->
                <div class="form-group">
                    <label class="form-label">Pilih Kategori <span class="required">*</span></label>
                    <select name="kategori_id" class="form-control-custom @error('kategori_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat->id }}" {{ old('kategori_id', $produk->kategori_id) == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Harga & Stok -->
                <div class="row-custom">
                    <div class="col-custom">
                        <label class="form-label">Harga <span class="required">*</span></label>
                        <div class="input-group-custom">
                            <span class="input-group-text-custom">Rp</span>
                            <input type="number" name="harga" class="form-control-custom" 
                                   required placeholder="15000" value="{{ old('harga', $produk->harga) }}">
                        </div>
                    </div>
                    <div class="col-custom">
                        <label class="form-label">Stok <span class="required">*</span></label>
                        <input type="number" name="stok" class="form-control-custom" 
                               required placeholder="50" value="{{ old('stok', $produk->stok) }}">
                    </div>
                </div>

                <!-- Foto Produk -->
                <div class="form-group">
                    <label class="form-label">Ganti Foto Produk</label>
                    <input type="file" name="foto" class="form-control-custom file-input" accept="image/*">
                    <div class="form-text-custom">
                        <i class="fas fa-info-circle me-1"></i> Format: JPG, PNG, JPEG. Maksimal 2MB. Kosongkan jika tidak ingin mengganti foto.
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <label class="form-label">Deskripsi Produk <span class="required">*</span></label>
                    <textarea name="deskripsi" class="textarea-custom" rows="5" 
                              placeholder="Masukkan kegunaan, dosis, atau efek samping obat..." required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    <div class="form-text-custom">
                        <i class="fas fa-info-circle me-1"></i> Gunakan Enter untuk baris baru agar rapi di halaman pengunjung.
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Tombol Update -->
                <button type="submit" class="btn-update">
                    <i class="fas fa-save"></i> Update Produk
                </button>
            </form>
        </div>
    </div>

</div>
@endsection