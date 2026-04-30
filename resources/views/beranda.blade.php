@extends('layouts.main')
@section('title', 'Beranda - Wijaya Farma')

@section('custom-css')
<style>
    /* =======================================================
       1. HERO SECTION (FOTO BESAR)
       ======================================================= */
    .hero-section {
        position: relative;
        width: 100%;
        min-height: 80vh; /* Tinggi foto 80% dari layar */
        display: flex;
        align-items: center;
        
        /* GANTI URL DI BAWAH JIKA INGIN PAKAI FOTO APOTEK ASLI ANDA */
        background: url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=2000&auto=format&fit=crop') center/cover no-repeat;
    }

    /* Lapisan Hitam Transparan Agar Tulisan Terbaca */
    .hero-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.65); /* Hitam transparan 65% */
        z-index: 1;
    }

    /* Area Tulisan di Tengah Foto */
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center; /* Tulisan ditengah */
        color: white;
        padding: 0 20px;
        width: 100%;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        letter-spacing: -1px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
    }
    
    .hero-title span {
        color: #1ABC9C; /* Kata 'Kesehatan' berwarna Tosca */
    }

    .hero-subtitle {
        font-size: 1.3rem;
        font-weight: 300;
        max-width: 700px;
        margin: 0 auto 40px auto;
        line-height: 1.6;
        color: #e8f8f5;
    }

    /* Tombol Cari Obat Besar */
    .btn-hero-utama {
        background-color: #1ABC9C;
        color: white;
        padding: 15px 40px;
        border-radius: 50px; /* Tombol membulat */
        font-size: 1.2rem;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
        box-shadow: 0 10px 20px rgba(26, 188, 156, 0.4);
    }
    .btn-hero-utama:hover { background-color: #16a085; transform: translateY(-5px); color: white; }

    /* =======================================================
       2. TIGA KOTAK KEUNGGULAN (DI BAWAH FOTO)
       ======================================================= */
    .kotak-fitur-area {
        margin-top: -60px; /* Menarik kotak naik ke atas foto (overlapping) */
        position: relative;
        z-index: 10;
        padding-bottom: 80px;
    }

    .kartu-fitur {
        background: white;
        border-radius: 15px;
        padding: 35px 25px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        height: 100%;
        transition: 0.3s;
        border-top: 5px solid transparent;
    }
    .kartu-fitur:hover { transform: translateY(-10px); border-top: 5px solid #1ABC9C; }

    .ikon-fitur {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #1ABC9C;
    }

    .judul-fitur { font-weight: 800; color: #2c3e50; font-size: 1.2rem; margin-bottom: 15px; }
    .teks-fitur { color: #7f8c8d; font-size: 0.95rem; line-height: 1.6; }
</style>
@endsection

@section('content')

    <!-- ================= HERO SECTION (FOTO BESAR) ================= -->
    <div class="hero-section">
        <div class="hero-overlay"></div>
        
        <div class="hero-content">
            <h1 class="hero-title">
                Mitra Cerdas Untuk<br>
                <span>Kesehatan Keluarga</span>
            </h1>
            
            <p class="hero-subtitle">
                "{{ $toko->deskripsi ?? 'Temukan informasi lengkap mengenai obat-obatan, vitamin, dan layanan edukasi kesehatan terpercaya dari Apoteker kami.' }}"
            </p>
            
            <!-- Tombol diarahkan ke Katalog Produk (bukan pesan antar) -->
            <a href="/produk" class="btn-hero-utama">🔍 Cari Obat di Katalog Kami</a>
        </div>
    </div>

    <!-- ================= KOTAK FITUR (DI BAWAH FOTO) ================= -->
    <div class="container kotak-fitur-area">
        <div class="row">
            
            <!-- Keunggulan 1: Kualitas Obat -->
            <div class="col-md-4 mb-4">
                <div class="kartu-fitur">
                    <div class="ikon-fitur">🛡️</div>
                    <h3 class="judul-fitur">Produk 100% Asli</h3>
                    <p class="teks-fitur">Semua obat, suplemen, dan alat kesehatan dijamin keasliannya dan berasal langsung dari distributor resmi bersertifikat.</p>
                </div>
            </div>

            <!-- Keunggulan 2: Konsultasi Langsung -->
            <div class="col-md-4 mb-4">
                <div class="kartu-fitur">
                    <div class="ikon-fitur">👩‍⚕️</div>
                    <h3 class="judul-fitur">Edukasi & Konsultasi</h3>
                    <p class="teks-fitur">Jangan ragu bertanya. Datang ke apotek kami untuk berkonsultasi langsung dengan Apoteker profesional mengenai resep Anda.</p>
                </div>
            </div>

            <!-- Keunggulan 3: Katalog Lengkap -->
            <div class="col-md-4 mb-4">
                <div class="kartu-fitur">
                    <div class="ikon-fitur">📚</div>
                    <h3 class="judul-fitur">Katalog Digital</h3>
                    <p class="teks-fitur">Cek ketersediaan dan informasi obat dari rumah melalui katalog online kami sebelum Anda datang berkunjung.</p>
                </div>
            </div>

        </div>
    </div>

@endsection