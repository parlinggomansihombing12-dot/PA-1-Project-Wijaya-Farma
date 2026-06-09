@extends('layouts.admin_master')
@section('title', 'Pengaturan Profil Toko - Wijaya Farma')

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
        gap: 10px;
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

    /* ================= CARD UTAMA ================= */
    .card-profil {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef2f6;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        max-width: 850px;
        margin: 0 auto;
    }

    /* ================= SECTION FOTO ================= */
    .foto-section {
        background: #fafcfc;
        padding: 20px;
        border-bottom: 1px solid #eef2f6;
    }

    .foto-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .foto-item {
        text-align: center;
        flex: 1;
        min-width: 180px;
    }

    .foto-label {
        font-size: 0.6rem;
        font-weight: 700;
        color: var(--text-muted);
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .foto-preview-img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: var(--shadow-sm);
    }

    .foto-preview-placeholder {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, var(--primary-light), #e2e8f0);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid white;
        margin: 0 auto;
    }

    .foto-preview-placeholder i {
        font-size: 2rem;
        color: var(--primary);
    }

    .foto-status {
        font-size: 0.55rem;
        color: var(--primary);
        margin-top: 6px;
    }

    .file-input-custom {
        margin-top: 8px;
        padding: 6px 10px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.65rem;
        width: 100%;
        max-width: 200px;
    }

    /* ================= FORM SECTION ================= */
    .form-section {
        padding: 20px;
    }

    .section-title {
        font-size: 0.85rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 1.5px solid var(--primary-light);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .section-title i {
        color: var(--primary);
        font-size: 0.9rem;
    }

    .form-group {
        margin-bottom: 14px;
    }

    .form-label {
        font-size: 0.65rem;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
        display: block;
    }

    .form-label .required {
        color: #ef4444;
    }

    .form-control-custom {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.75rem;
        transition: all 0.2s;
        font-family: 'Inter', sans-serif;
        background: white;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    textarea.form-control-custom {
        resize: vertical;
        min-height: 60px;
    }

    /* Row Dua Kolom */
    .row-custom {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .col-custom {
        flex: 1;
        min-width: 180px;
    }

    /* Divider */
    .form-divider {
        margin: 20px 0 15px;
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
    }

    /* ================= TOMBOL SIMPAN ================= */
    .btn-simpan {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 9px 20px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.75rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
        width: 100%;
    }

    .btn-simpan:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(26,188,156,0.25);
        gap: 10px;
    }

    /* ================= ALERT ================= */
    .alert-custom {
        background: #d1fae5;
        border-left: 3px solid var(--primary);
        border-radius: 10px;
        padding: 10px 16px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 850px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert-custom span {
        color: #065f46;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .alert-custom i {
        cursor: pointer;
        color: #065f46;
        font-size: 0.8rem;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content {
            padding: 10px;
        }
        .page-title {
            font-size: 1rem;
        }
        .form-section {
            padding: 15px;
        }
        .foto-section {
            padding: 15px;
        }
        .foto-preview-img,
        .foto-preview-placeholder {
            width: 75px;
            height: 75px;
        }
        .row-custom {
            flex-direction: column;
            gap: 10px;
        }
        .btn-simpan {
            padding: 8px 16px;
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
            <i class="fas fa-store-alt"></i> Pengaturan Profil Toko
        </h2>
    </div>

    <!-- PESAN SUKSES -->
    @if(session('success'))
        <div class="alert-custom">
            <span><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.style.display='none'"></i>
        </div>
    @endif

    <!-- CARD PROFIL -->
    <div class="card-profil">
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- SECTION FOTO -->
            <div class="foto-section">
                <div class="foto-grid">
                    <!-- Foto Toko -->
                    <div class="foto-item">
                        <div class="foto-label">📸 Foto Apotek</div>
                        @if(isset($toko->foto_toko) && $toko->foto_toko)
                            <img src="{{ asset('images/profil/' . $toko->foto_toko) }}" class="foto-preview-img" alt="Foto Toko">
                        @else
                            <div class="foto-preview-placeholder">
                                <i class="fas fa-store"></i>
                            </div>
                        @endif
                        <div class="foto-status">
                            @if(isset($toko->foto_toko) && $toko->foto_toko)
                                ✓ Foto tersimpan
                            @else
                                <i class="fas fa-info-circle"></i> Belum ada foto
                            @endif
                        </div>
                        <input type="file" name="foto_toko" class="file-input-custom" accept="image/*">
                    </div>

                    <!-- Foto Pemilik -->
                    <div class="foto-item">
                        <div class="foto-label">👨‍⚕️ Foto Pemilik</div>
                        @if(isset($toko->foto_pemilik) && $toko->foto_pemilik)
                            <img src="{{ asset('images/profil/' . $toko->foto_pemilik) }}" class="foto-preview-img" alt="Foto Pemilik">
                        @else
                            <div class="foto-preview-placeholder">
                                <i class="fas fa-user-md"></i>
                            </div>
                        @endif
                        <div class="foto-status">
                            @if(isset($toko->foto_pemilik) && $toko->foto_pemilik)
                                ✓ Foto tersimpan
                            @else
                                <i class="fas fa-info-circle"></i> Belum ada foto
                            @endif
                        </div>
                        <input type="file" name="foto_pemilik" class="file-input-custom" accept="image/*">
                    </div>
                </div>
            </div>

            <!-- SECTION FORM -->
            <div class="form-section">
                <!-- INFORMASI TOKO -->
                <div class="section-title">
                    <i class="fas fa-store"></i> Informasi Apotek
                </div>

                <div class="form-group">
                    <label class="form-label">Nama Apotek <span class="required">*</span></label>
                    <input type="text" name="nama_toko" class="form-control-custom" 
                           value="{{ $toko->nama_toko ?? '' }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Slogan / Deskripsi</label>
                    <textarea name="deskripsi" class="form-control-custom" rows="2" 
                              placeholder="Slogan singkat...">{{ $toko->deskripsi ?? '' }}</textarea>
                </div>

                <!-- Input tersembunyi untuk Alamat & HP -->
                <input type="hidden" name="alamat" value="{{ $toko->alamat ?? '-' }}">
                <input type="hidden" name="no_hp" value="{{ $toko->no_hp ?? '-' }}">

                <!-- VISI & MISI -->
                <div class="section-title mt-2">
                    <i class="fas fa-eye"></i> Visi & Misi
                </div>

                <div class="row-custom">
                    <div class="col-custom">
                        <div class="form-group">
                            <label class="form-label">Visi</label>
                            <textarea name="visi" class="form-control-custom" rows="3" 
                                      placeholder="Visi apotek...">{{ $toko->visi ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-custom">
                        <div class="form-group">
                            <label class="form-label">Misi</label>
                            <textarea name="misi" class="form-control-custom" rows="3" 
                                      placeholder="Misi apotek...">{{ $toko->misi ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- SEJARAH -->
                <div class="form-group">
                    <label class="form-label">Sejarah Berdirinya</label>
                    <textarea name="sejarah" class="form-control-custom" rows="2" 
                              placeholder="Sejarah apotek...">{{ $toko->sejarah ?? '' }}</textarea>
                </div>

                <div class="form-divider"></div>

                <!-- PROFIL PEMILIK -->
                <div class="section-title">
                    <i class="fas fa-user-md"></i> Profil Pemilik / Apoteker
                </div>

                <div class="form-group">
                    <label class="form-label">Nama Lengkap & Gelar</label>
                    <input type="text" name="nama_pemilik" class="form-control-custom" 
                           value="{{ $toko->nama_pemilik ?? '' }}" 
                           placeholder="Contoh: apt. Budi Wijaya, S.Farm.">
                </div>

                <div class="row-custom">
                    <div class="col-custom">
                        <div class="form-group">
                            <label class="form-label">Riwayat Pendidikan</label>
                            <textarea name="pendidikan_pemilik" class="form-control-custom" rows="2" 
                                      placeholder="Pendidikan...">{{ $toko->pendidikan_pemilik ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-custom">
                        <div class="form-group">
                            <label class="form-label">Pengalaman Kerja</label>
                            <textarea name="pengalaman_pemilik" class="form-control-custom" rows="2" 
                                      placeholder="Pengalaman...">{{ $toko->pengalaman_pemilik ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn-simpan">
                    <i class="fas fa-save"></i> Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection