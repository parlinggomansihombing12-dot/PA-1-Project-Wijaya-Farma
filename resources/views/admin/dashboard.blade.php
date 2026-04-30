@extends('layouts.admin_master')
@section('title', 'Dashboard - Admin Panel')

@section('custom-css')
<style>
    /* ========================================================
       DESAIN KUSTOM DASHBOARD (TEMA GLASSMORPHISM & GRADIENT)
       ======================================================== */
       
    /* 1. Latar Belakang Halus dengan Pola Elegan */
    .content {
        background-color: #f0f4f8; /* Abu-abu kebiruan super lembut */
        background-image: radial-gradient(#d1d8e0 1px, transparent 1px);
        background-size: 25px 25px;
    }

    /* 2. Kartu Sambutan (Gradient Mewah) */
    .welcome-card {
        background: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%);
        color: white;
        border-radius: 20px; /* Sudut lebih melengkung */
        border: none;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(26, 188, 156, 0.2);
    }
    
    /* Dekorasi Lingkaran Abstrak di Belakang Teks Sambutan */
    .welcome-card::before {
        content: ''; position: absolute; top: -50px; right: -50px;
        width: 200px; height: 200px; background: rgba(255,255,255,0.1);
        border-radius: 50%; z-index: 1;
    }
    .welcome-card::after {
        content: '🏥'; font-size: 8rem; position: absolute; right: 20px;
        bottom: -20px; opacity: 0.15; z-index: 1; transform: rotate(-10deg);
    }
    
    .welcome-text { position: relative; z-index: 2; }

    /* 3. Kartu Menu Shortcut (Kaca 3D / Soft Neumorphism) */
    .menu-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Efek melenting */
        text-decoration: none;
        display: block;
        color: #2C3E50;
        padding: 30px 25px;
        position: relative;
        overflow: hidden;
        z-index: 1;
        border-bottom: 5px solid transparent; /* Garis transparan di bawah */
    }

    /* Efek Saat Mouse Diarahkan (Hover) */
    .menu-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 35px rgba(26, 188, 156, 0.15);
        color: #1ABC9C;
    }

    /* 4. Kotak Ikon Warna-Warni */
    .menu-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px; /* Lebih membulat */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 20px;
        color: white;
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        transition: 0.3s;
    }
    
    .menu-card:hover .menu-icon { transform: scale(1.1) rotate(5deg); } /* Ikon ikut goyang */

    /* Pewarnaan Khusus Tiap Ikon */
    .menu-card.c-produk:hover { border-bottom-color: #3498db; }
    .icon-produk { background: linear-gradient(135deg, #4facfe, #00f2fe); }

    .menu-card.c-kategori:hover { border-bottom-color: #9b59b6; }
    .icon-kategori { background: linear-gradient(135deg, #a18cd1, #fbc2eb); }

    .menu-card.c-layanan:hover { border-bottom-color: #e74c3c; }
    .icon-layanan { background: linear-gradient(135deg, #ff0844, #ffb199); }

    .menu-card.c-artikel:hover { border-bottom-color: #f1c40f; }
    .icon-artikel { background: linear-gradient(135deg, #f6d365, #fda085); }

    .menu-card.c-testimoni:hover { border-bottom-color: #e67e22; }
    .icon-testimoni { background: linear-gradient(135deg, #f093fb, #f5576c); }

    .menu-card.c-profil:hover { border-bottom-color: #1ABC9C; }
    .icon-profil { background: linear-gradient(135deg, #1ABC9C, #117a65); }

    .menu-card.c-kontak:hover { border-bottom-color: #34495e; }
    .icon-kontak { background: linear-gradient(135deg, #667eea, #764ba2); }

    /* 5. Teks di Dalam Kartu */
    .menu-title { font-size: 1.2rem; font-weight: 800; margin-bottom: 8px; letter-spacing: -0.5px;}
    .menu-desc { font-size: 0.9rem; color: #7f8c8d; margin-bottom: 0; line-height: 1.5; }
    
    /* Panah Kanan Bawah */
    .menu-arrow {
        position: absolute;
        bottom: 25px;
        right: 25px;
        font-size: 1.2rem;
        color: #ecf0f1;
        transition: 0.4s;
    }
    .menu-card:hover .menu-arrow { color: inherit; transform: translateX(5px); }
</style>
@endsection

@section('content')

    <!-- HEADER SAMBUTAN MEWAH -->
    <div class="card welcome-card mb-5">
        <div class="card-body p-5 welcome-text">
            <h2 class="fw-bold mb-3 display-6" style="text-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                Selamat Datang, {{ Auth::user()->name }}! 👋
            </h2>
            <p class="lead mb-0" style="font-weight: 400; opacity: 0.9;">
                Ini adalah Pusat Kendali <strong>Apotek Wijaya Farma</strong>. Silakan pilih menu di bawah ini untuk mulai mengelola data website Anda dengan cepat dan menyenangkan.
            </p>
        </div>
    </div>

    <div class="d-flex align-items-center mb-4">
        <div style="width: 5px; height: 30px; background-color: #1ABC9C; border-radius: 5px; margin-right: 15px;"></div>
        <h4 class="fw-bold mb-0" style="color: #2C3E50; letter-spacing: -0.5px;">Pintas Kelola Data (Shortcut)</h4>
    </div>

    <!-- GRID KARTU MENU -->
    <div class="row g-4">
        
        <!-- 1. KELOLA PRODUK -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/produk" class="menu-card c-produk h-100">
                <div class="menu-icon icon-produk"><i class="fas fa-box-open"></i></div>
                <h5 class="menu-title">Produk Obat</h5>
                <p class="menu-desc">Tambah obat baru, update harga, & atur stok.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 2. KELOLA KATEGORI -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/kategori" class="menu-card c-kategori h-100">
                <div class="menu-icon icon-kategori"><i class="fas fa-tags"></i></div>
                <h5 class="menu-title">Kategori</h5>
                <p class="menu-desc">Kelompokkan obat agar mudah dicari pelanggan.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 3. KELOLA LAYANAN -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/layanan" class="menu-card c-layanan h-100">
                <div class="menu-icon icon-layanan"><i class="fas fa-notes-medical"></i></div>
                <h5 class="menu-title">Layanan</h5>
                <p class="menu-desc">Atur layanan kesehatan (Cek Tensi, Gula Darah).</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 4. KELOLA ARTIKEL -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/artikel" class="menu-card c-artikel h-100">
                <div class="menu-icon icon-artikel"><i class="fas fa-newspaper"></i></div>
                <h5 class="menu-title">Artikel Edukasi</h5>
                <p class="menu-desc">Tulis berita dan edukasi kesehatan publik.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 5. KELOLA TESTIMONI -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/testimoni" class="menu-card c-testimoni h-100">
                <div class="menu-icon icon-testimoni"><i class="fas fa-star"></i></div>
                <h5 class="menu-title">Testimoni</h5>
                <p class="menu-desc">Setujui ulasan dan rating dari pelanggan.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 6. PROFIL TOKO -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/profil-toko" class="menu-card c-profil h-100">
                <div class="menu-icon icon-profil"><i class="fas fa-store-alt"></i></div>
                <h5 class="menu-title">Profil Apotek</h5>
                <p class="menu-desc">Ubah nama, alamat, kontak, & visi misi toko.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- 7. KELOLA KONTAK -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/admin/kontak" class="menu-card c-kontak h-100">
                <div class="menu-icon icon-kontak"><i class="fas fa-envelope-open-text"></i></div>
                <h5 class="menu-title">Kelola Kontak</h5>
                <p class="menu-desc">Baca dan balas pesan dari form kontak web.</p>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

    </div>

@endsection