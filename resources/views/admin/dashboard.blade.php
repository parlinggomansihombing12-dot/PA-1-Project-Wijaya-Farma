@extends('layouts.admin_master')
@section('title', 'Dashboard - Admin Panel')

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
        --shadow-lg: 0 8px 20px rgba(0,0,0,0.08);
    }

    /* ================= DASHBOARD CONTENT ================= */
    .content {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 20px;
        min-height: 100vh;
    }

    /* ================= WELCOME CARD - DIPERKECIL ================= */
    .welcome-card {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        border-radius: 20px;
        border: none;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        margin-bottom: 30px;
    }
    
    .welcome-card::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 150px;
        height: 150px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }
    
    .welcome-card::after {
        content: '🏥';
        font-size: 6rem;
        position: absolute;
        right: 15px;
        bottom: -20px;
        opacity: 0.1;
        transform: rotate(-10deg);
    }
    
    .welcome-text {
        position: relative;
        z-index: 2;
        padding: 25px 30px;
    }
    
    .welcome-text h2 {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 8px;
    }
    
    .welcome-text p {
        font-size: 0.85rem;
        opacity: 0.9;
        margin: 0;
    }

    /* ================= SECTION HEADER ================= */
    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .section-line {
        width: 4px;
        height: 25px;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        border-radius: 4px;
        margin-right: 12px;
    }
    
    .section-header h4 {
        font-size: 1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        letter-spacing: -0.3px;
    }

    /* ================= GRID MENU - 6 KOLOM ================= */
    .row.g-4 {
        margin: 0 -10px;
    }
    
    .row.g-4 > [class*="col-"] {
        padding: 0 10px;
    }
    
    .menu-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef2f6;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
        color: var(--dark);
        padding: 18px 16px;
        position: relative;
        overflow: hidden;
        height: 100%;
    }
    
    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }
    
    /* Ikon */
    .menu-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 14px;
        color: white;
        transition: all 0.3s;
    }
    
    .menu-card:hover .menu-icon {
        transform: scale(1.05) rotate(3deg);
    }
    
    /* Warna Ikon */
    .icon-produk { background: linear-gradient(135deg, #4facfe, #00f2fe); }
    .icon-kategori { background: linear-gradient(135deg, #a18cd1, #fbc2eb); }
    .icon-layanan { background: linear-gradient(135deg, #ff0844, #ffb199); }
    .icon-artikel { background: linear-gradient(135deg, #f6d365, #fda085); }
    .icon-testimoni { background: linear-gradient(135deg, #f093fb, #f5576c); }
    .icon-profil { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); }
    .icon-kontak { background: linear-gradient(135deg, #667eea, #764ba2); }
    
    /* Teks */
    .menu-title {
        font-size: 0.9rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 6px;
        letter-spacing: -0.3px;
    }
    
    .menu-desc {
        font-size: 0.7rem;
        color: var(--text-muted);
        line-height: 1.45;
        margin-bottom: 0;
    }
    
    /* Panah */
    .menu-arrow {
        position: absolute;
        bottom: 15px;
        right: 15px;
        font-size: 0.9rem;
        color: #cbd5e1;
        transition: all 0.3s;
    }
    
    .menu-card:hover .menu-arrow {
        color: var(--primary);
        transform: translateX(4px);
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1200px) {
        .col-lg-3 {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }
    
    @media (max-width: 900px) {
        .col-lg-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    
    @media (max-width: 600px) {
        .col-lg-3 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .welcome-text {
            padding: 20px;
        }
        .welcome-text h2 {
            font-size: 1.2rem;
        }
        .welcome-text p {
            font-size: 0.75rem;
        }
        .menu-card {
            padding: 15px;
        }
        .menu-icon {
            width: 42px;
            height: 42px;
            font-size: 1.1rem;
        }
        .menu-title {
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')

<div class="content">
    
    <!-- WELCOME CARD -->
    <div class="welcome-card">
        <div class="welcome-text">
            <h2>Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
            <p>Ini adalah Pusat Kendali Apotek Wijaya Farma. Silakan pilih menu di bawah untuk mulai mengelola data.</p>
        </div>
    </div>

    <!-- SECTION HEADER -->
    <div class="section-header">
        <div class="section-line"></div>
        <h4>⚡ Pintas Kelola Data (Shortcut)</h4>
    </div>

    <!-- GRID MENU - 7 MENU -->
    <div class="row g-4">
        
        <!-- 1. KELOLA PRODUK -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/produk" class="menu-card">
                <div class="menu-icon icon-produk"><i class="fas fa-box-open"></i></div>
                <h5 class="menu-title">Produk Obat</h5>
                <p class="menu-desc">Tambah obat baru, update harga, & atur stok.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 2. KELOLA KATEGORI -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/kategori" class="menu-card">
                <div class="menu-icon icon-kategori"><i class="fas fa-tags"></i></div>
                <h5 class="menu-title">Kategori</h5>
                <p class="menu-desc">Kelompokkan obat agar mudah dicari pelanggan.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 3. KELOLA LAYANAN -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/layanan" class="menu-card">
                <div class="menu-icon icon-layanan"><i class="fas fa-notes-medical"></i></div>
                <h5 class="menu-title">Layanan</h5>
                <p class="menu-desc">Atur layanan kesehatan (Cek Gula Darah, dll).</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 4. KELOLA ARTIKEL -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/artikel" class="menu-card">
                <div class="menu-icon icon-artikel"><i class="fas fa-newspaper"></i></div>
                <h5 class="menu-title">Artikel Edukasi</h5>
                <p class="menu-desc">Tulis berita dan edukasi kesehatan publik.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 5. KELOLA TESTIMONI -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/testimoni" class="menu-card">
                <div class="menu-icon icon-testimoni"><i class="fas fa-star"></i></div>
                <h5 class="menu-title">Testimoni</h5>
                <p class="menu-desc">Setujui ulasan dan rating dari pelanggan.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 6. PROFIL TOKO -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/profil-toko" class="menu-card">
                <div class="menu-icon icon-profil"><i class="fas fa-store-alt"></i></div>
                <h5 class="menu-title">Profil Apotek</h5>
                <p class="menu-desc">Ubah nama, alamat, kontak, & visi misi toko.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 7. KELOLA KONTAK -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/kontak" class="menu-card">
                <div class="menu-icon icon-kontak"><i class="fas fa-envelope-open-text"></i></div>
                <h5 class="menu-title">Kelola Kontak</h5>
                <p class="menu-desc">Baca dan balas pesan dari form kontak web.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

    </div>

</div>

@endsection