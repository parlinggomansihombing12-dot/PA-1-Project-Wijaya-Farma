@extends('layouts.admin_master')
@section('title', 'Kelola Kontak - Admin Panel')

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
        margin-bottom: 20px;
    }

    .page-header h1 {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .page-header h1 i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    /* ================= ALERT ================= */
    .alert-custom {
        background: #d1fae5;
        border-left: 3px solid var(--primary);
        border-radius: 10px;
        padding: 10px 16px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
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

    /* ================= CARD ================= */
    .card-custom {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef2f6;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }

    .card-header-custom {
        padding: 14px 20px;
        background: linear-gradient(135deg, #f8fafc, white);
        border-bottom: 1px solid #eef2f6;
    }

    .card-header-custom h6 {
        font-size: 0.85rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .card-header-custom h6 i {
        color: var(--primary);
        font-size: 0.9rem;
    }

    .card-body-custom {
        padding: 20px;
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
        margin-right: 5px;
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

    textarea.form-control-custom {
        resize: vertical;
        min-height: 80px;
    }

    /* Row Dua Kolom */
    .row-custom {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
    }

    .col-custom {
        flex: 1;
        min-width: 180px;
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
        gap: 8px;
        cursor: pointer;
    }

    .btn-simpan:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(26,188,156,0.25);
        gap: 10px;
    }

    /* ================= CARD PETUNJUK ================= */
    .card-tips {
        background: linear-gradient(135deg, #fef3c7, #fffbeb);
        border: 1px solid #fde68a;
    }

    .tips-title {
        font-size: 0.85rem;
        font-weight: 800;
        color: #b45309;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .tips-title i {
        font-size: 0.9rem;
    }

    .tips-list {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .tips-list li {
        font-size: 0.7rem;
        color: #78350f;
        margin-bottom: 10px;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    .tips-list li i {
        color: #f59e0b;
        font-size: 0.7rem;
        margin-top: 2px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content {
            padding: 10px;
        }
        .page-header h1 {
            font-size: 1rem;
        }
        .card-body-custom {
            padding: 15px;
        }
        .row-custom {
            flex-direction: column;
            gap: 15px;
        }
        .btn-simpan {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <h1>
            <i class="fas fa-address-card"></i> Pengaturan Kontak & Lokasi
        </h1>
    </div>

    <!-- ALERT SUKSES -->
    @if(session('success'))
    <div class="alert-custom">
        <span><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</span>
        <i class="fas fa-times" onclick="this.parentElement.style.display='none'"></i>
    </div>
    @endif

    <!-- DUA KOLOM -->
    <div class="row g-3">
        
        <!-- KOLOM KIRI - FORM -->
        <div class="col-lg-8">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h6>
                        <i class="fas fa-edit"></i> Form Informasi Kontak
                    </h6>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('admin.kontak.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Alamat -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Alamat Lengkap <span class="required">*</span>
                            </label>
                            <textarea name="alamat" class="form-control-custom" rows="3" required placeholder="Masukkan alamat lengkap apotek...">{{ $toko->alamat ?? '' }}</textarea>
                        </div>

                        <!-- WhatsApp & Email -->
                        <div class="row-custom">
                            <div class="col-custom">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fab fa-whatsapp"></i> Nomor WhatsApp <span class="required">*</span>
                                    </label>
                                    <input type="text" name="no_hp" class="form-control-custom" 
                                           value="{{ $toko->no_hp ?? '' }}" 
                                           placeholder="Contoh: 6281234567890" required>
                                    <small class="text-muted" style="font-size: 0.6rem;">Gunakan kode negara, contoh: 62 untuk Indonesia</small>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i> Email <span class="required">*</span>
                                    </label>
                                    <input type="email" name="email" class="form-control-custom" 
                                           value="{{ $toko->email ?? '' }}" 
                                           placeholder="info@wijayafarma.com" required>
                                </div>
                            </div>
                        </div>

                        <!-- Jam Operasional -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-clock"></i> Jam Operasional <span class="required">*</span>
                            </label>
                            <input type="text" name="jam_operasional" class="form-control-custom" 
                                   value="{{ $toko->jam_operasional ?? '' }}" 
                                   placeholder="Contoh: Senin - Sabtu: 08.00 - 21.00" required>
                        </div>

                        <!-- Google Maps Embed URL -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-map-marked-alt"></i> Google Maps Embed URL
                            </label>
                            <input type="text" name="map_url" class="form-control-custom" 
                                   value="{{ $toko->map_url ?? '' }}" 
                                   placeholder="https://www.google.com/maps/embed?pb=...">
                            <small class="text-muted" style="font-size: 0.6rem;">
                                <i class="fas fa-info-circle me-1"></i> 
                                Cara ambil: Buka Google Maps > Share > Embed map > Ambil isi dalam tanda petik src="..."
                            </small>
                        </div>

                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn-simpan">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN - PETUNJUK -->
        <div class="col-lg-4">
            <div class="card-custom card-tips">
                <div class="card-body-custom">
                    <div class="tips-title">
                        <i class="fas fa-info-circle"></i> Petunjuk
                    </div>
                    <ul class="tips-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Data yang Anda masukkan akan tampil di halaman <strong>Kontak</strong> yang diakses pengunjung.</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pastikan nomor WhatsApp diawali kode negara <strong>62</strong> (contoh: 6281234567890).</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Untuk Maps, gunakan link <strong>embed</strong> dari Google Maps agar peta tampil langsung.</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Jam operasional akan ditampilkan di halaman kontak.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection