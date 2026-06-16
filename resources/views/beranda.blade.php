@extends('layouts.main')
@section('title', 'Beranda - Wijaya Farma')

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

    /* =======================================================
       HERO SECTION - FULL WIDTH
       ======================================================= */
    .hero-section {
        position: relative;
        width: 100%;
        min-height: 70vh;
        display: flex;
        align-items: center;
        background: url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
        margin-top: -20px;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.65);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        padding: 0 20px;
        width: 100%;
    }

    .hero-title {
        font-size: 2.8rem;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 15px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }
    
    .hero-title span {
        color: var(--primary);
    }

    .hero-subtitle {
        font-size: 1.05rem;
        font-weight: 300;
        max-width: 600px;
        margin: 0 auto 30px auto;
        line-height: 1.6;
        color: rgba(255,255,255,0.9);
    }

    .btn-hero-utama {
        background-color: var(--primary);
        color: white;
        padding: 14px 40px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s;
        display: inline-block;
        box-shadow: 0 5px 15px rgba(26, 188, 156, 0.3);
    }
    
    .btn-hero-utama:hover {
        background-color: var(--primary-dark);
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 8px 20px rgba(26, 188, 156, 0.4);
    }

    /* =======================================================
       TIGA KOTAK KEUNGGULAN
       ======================================================= */
    .kotak-fitur-area {
        margin-top: -50px;
        position: relative;
        z-index: 10;
        padding: 0 0 40px 0;
        background: transparent;
    }

    .kartu-fitur {
        background: white;
        border-radius: 16px;
        padding: 25px 20px;
        text-align: center;
        box-shadow: var(--shadow-md);
        height: 100%;
        transition: all 0.2s;
        border-top: 3px solid transparent;
    }
    
    .kartu-fitur:hover {
        transform: translateY(-5px);
        border-top: 3px solid var(--primary);
        box-shadow: var(--shadow-lg);
    }

    .ikon-fitur {
        font-size: 2.5rem;
        margin-bottom: 12px;
        color: var(--primary);
    }

    .judul-fitur {
        font-weight: 800;
        color: var(--dark);
        font-size: 1rem;
        margin-bottom: 10px;
    }
    
    .teks-fitur {
        color: var(--text-muted);
        font-size: 0.8rem;
        line-height: 1.55;
    }

    /* =======================================================
       PRODUK TERBARU SECTION
       ======================================================= */
    .produk-terbaru-section {
        padding: 40px 0 50px 0;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    }

    .section-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-badge {
        display: inline-block;
        background: var(--primary-light);
        color: var(--primary-dark);
        padding: 4px 16px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        margin-bottom: 12px;
        letter-spacing: 1px;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .section-underline {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        margin: 0 auto;
        border-radius: 3px;
    }

    .produk-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }

    .produk-item {
        background: white;
        border-radius: 14px;
        overflow: hidden;
        transition: all 0.2s;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
    }

    .produk-item:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .produk-img {
        height: 130px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        padding: 15px;
    }

    .produk-img img {
        max-width: 85%;
        max-height: 90px;
        object-fit: contain;
    }

    .produk-info {
        padding: 12px;
    }

    .produk-nama {
        font-size: 0.8rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 5px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 36px;
    }

    .produk-harga {
        font-size: 0.85rem;
        font-weight: 800;
        color: #e67e22;
        margin-bottom: 8px;
    }

    .btn-produk {
        background: #f1f5f9;
        text-align: center;
        padding: 6px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 0.65rem;
        font-weight: 700;
        color: var(--dark);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        border: 1px solid #e2e8f0;
        transition: all 0.2s;
    }

    .btn-produk:hover {
        background: var(--primary);
        color: white;
    }

    /* =======================================================
       LAYANAN KAMI SECTION
       ======================================================= */
    .layanan-section {
        padding: 40px 0 50px 0;
        background: white;
    }

    .layanan-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .layanan-card {
        background: var(--primary-ultra-soft);
        border-radius: 14px;
        padding: 20px;
        text-align: center;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        transition: all 0.2s;
    }

    .layanan-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .layanan-icon {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 12px;
    }

    .layanan-title {
        font-size: 0.9rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 6px;
    }

    .layanan-desc {
        font-size: 0.7rem;
        color: var(--text-muted);
        line-height: 1.5;
    }

    /* =======================================================
       RESPONSIVE
       ======================================================= */
    @media (max-width: 1100px) {
        .produk-grid {
            grid-template-columns: repeat(4, 1fr);
        }
        .layanan-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 900px) {
        .produk-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        .layanan-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 50vh;
            margin-top: -10px;
        }
        .hero-title {
            font-size: 1.8rem;
        }
        .hero-subtitle {
            font-size: 0.85rem;
            margin-bottom: 20px;
        }
        .btn-hero-utama {
            padding: 10px 28px;
            font-size: 0.85rem;
        }
        .kotak-fitur-area {
            margin-top: -30px;
            padding-bottom: 30px;
        }
        .kartu-fitur {
            padding: 20px 15px;
        }
        .produk-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .layanan-grid {
            grid-template-columns: 1fr;
        }
        .section-title {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 500px) {
        .produk-grid {
            grid-template-columns: 1fr;
        }
        .hero-title {
            font-size: 1.4rem;
        }
    }
</style>
@endsection

@section('content')

<!-- ================= HERO SECTION - FULL ================= -->
<div class="hero-section">
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <h1 class="hero-title">
            Mitra Cerdas Untuk<br>
            <span>Kesehatan Keluarga</span>
        </h1>
        
        <p class="hero-subtitle">
            {{ $toko->deskripsi ?? 'Temukan informasi lengkap mengenai obat-obatan, vitamin, dan layanan edukasi kesehatan terpercaya dari Apoteker kami.' }}
        </p>
        
        <a href="/produk" class="btn-hero-utama">🔍 Cari Obat di Katalog Kami</a>
    </div>
</div>

<!-- ================= KOTAK FITUR ================= -->
<div class="container kotak-fitur-area">
    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="kartu-fitur">
                <div class="ikon-fitur">🛡️</div>
                <h3 class="judul-fitur">Produk 100% Asli</h3>
                <p class="teks-fitur">Semua obat, suplemen, dan alat kesehatan dijamin keasliannya dan berasal langsung dari distributor resmi bersertifikat.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="kartu-fitur">
                <div class="ikon-fitur">👩‍⚕️</div>
                <h3 class="judul-fitur">Edukasi & Konsultasi</h3>
                <p class="teks-fitur">Jangan ragu bertanya. Datang ke apotek kami untuk berkonsultasi langsung dengan Apoteker profesional mengenai resep Anda.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="kartu-fitur">
                <div class="ikon-fitur">📚</div>
                <h3 class="judul-fitur">Katalog Digital</h3>
                <p class="teks-fitur">Cek ketersediaan dan informasi obat dari rumah melalui katalog online kami sebelum Anda datang berkunjung.</p>
            </div>
        </div>

    </div>
</div>

<!-- ================= PRODUK TERBARU ================= -->
<div class="produk-terbaru-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">✨ REKOMENDASI</div>
            <h2 class="section-title">Produk Terbaru</h2>
            <div class="section-underline"></div>
        </div>

        <div class="produk-grid">
            @php
                $produk_terbaru = \App\Models\Produk::latest()->take(5)->get();
            @endphp
            
            @forelse($produk_terbaru as $item)
            <div class="produk-item">
                <div class="produk-img">
                    @if($item->foto)
                        <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="Produk">
                    @endif
                </div>
                <div class="produk-info">
                    <div class="produk-nama">{{ \Illuminate\Support\Str::limit($item->nama_obat, 30) }}</div>
                    <div class="produk-harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                    <a href="/produk/{{ $item->id }}" class="btn-produk">
                        Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @empty
                <div class="text-center" style="grid-column: 1 / -1;">Belum ada produk</div>
            @endforelse
        </div>
    </div>
</div>

<!-- ================= LAYANAN KAMI ================= -->
<div class="layanan-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">🩺 LAYANAN</div>
            <h2 class="section-title">Layanan Kami</h2>
            <div class="section-underline"></div>
        </div>

        <div class="layanan-grid">
            <div class="layanan-card">
                <div class="layanan-icon">💊</div>
                <h3 class="layanan-title">Konsultasi Obat</h3>
                <p class="layanan-desc">Konsultasi langsung dengan apoteker profesional</p>
            </div>
            <div class="layanan-card">
                <div class="layanan-icon">🩸</div>
                <h3 class="layanan-title">Cek Kesehatan</h3>
                <p class="layanan-desc">Cek gula darah, kolesterol, dan asam urat</p>
            </div>
            <div class="layanan-card">
                <div class="layanan-icon">📦</div>
                <h3 class="layanan-title">Resep Online</h3>
                <p class="layanan-desc">Kirim resep dan konsultasi via WhatsApp</p>
            </div>
            <div class="layanan-card">
                <div class="layanan-icon">📚</div>
                <h3 class="layanan-title">Edukasi Kesehatan</h3>
                <p class="layanan-desc">Artikel dan tips kesehatan terupdate</p>
            </div>
        </div>
    </div>
</div>

@endsection