@extends('layouts.main')

@section('title', 'Profil Kami - Wijaya Farma')

@push('custom-css')
<style>
    /* Reset margin agar hero bisa full-width menempel pinggir layar */
    body { background-color: #ffffff; font-family: 'Inter', 'Segoe UI', sans-serif; overflow-x: hidden; }
    
    /* 1. HERO SECTION (FOTO BESAR FULL WIDTH) */
    .hero-profil {
        position: relative;
        width: 100vw;
        height: 60vh;
        min-height: 400px;
        /* FOTO HEADER (Gambar Apotek) */
        background: url('https://images.unsplash.com/photo-1631549916768-4119b2e5f926?q=80&w=2000&auto=format&fit=crop') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: calc(-50vw + 50%); /* Trik agar full width */
        margin-bottom: 80px;
    }

    /* Lapisan Gelap (Overlay) agar teks putih terbaca */
    .hero-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to bottom, rgba(26,188,156,0.85) 0%, rgba(44,62,80,0.85) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        letter-spacing: -1px;
        margin-bottom: 20px;
        text-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        font-weight: 300;
        max-width: 800px;
        margin: 0 auto;
        opacity: 0.9;
    }

    /* 2. SECTION SEJARAH (KIRI FOTO, KANAN TEKS) */
    .sejarah-section {
        padding: 0 0 100px 0;
    }
    
    .judul-sejarah {
        color: #2c3e50;
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 30px;
        position: relative;
        display: inline-block;
    }

    /* Garis Hijau di bawah Judul */
    .judul-sejarah::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 0;
        width: 80px;
        height: 5px;
        background-color: #1ABC9C;
        border-radius: 3px;
    }

    .teks-sejarah {
        color: #596275;
        font-size: 1.1rem;
        line-height: 1.8;
        text-align: justify;
        margin-top: 20px;
    }

    /* Foto Pendukung Sejarah */
    .foto-sejarah-wrapper {
        position: relative;
        padding-right: 30px;
        padding-bottom: 30px;
    }
    
    /* Kotak Hijau Dekorasi di belakang foto */
    .foto-sejarah-wrapper::before {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 80%;
        height: 80%;
        background-color: #e8f8f5;
        border-radius: 20px;
        z-index: 0;
    }

    .foto-sejarah {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        position: relative;
        z-index: 1;
        object-fit: cover;
        height: 450px; 
    }
</style>
@endpush

@section('content')

    <!-- ================= HERO SECTION FULL WIDTH ================= -->
    <div class="hero-profil">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ $toko->nama_toko ?? 'Apotek Wijaya Farma' }}</h1>
            <p class="hero-subtitle">
                "{{ $toko->deskripsi ?? 'Mitra terpercaya keluarga Anda dalam menyediakan layanan kesehatan dan obat-obatan yang aman, lengkap, serta terjangkau.' }}"
            </p>
        </div>
    </div>

    <!-- ================= KONTEN SEJARAH (SPLIT SCREEN) ================= -->
    <div class="container sejarah-section">
        <div class="row align-items-center">
            
            <!-- KOLOM KIRI: FOTO SEJARAH APOTEK -->
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="foto-sejarah-wrapper">
                    <!-- FOTO ILUSTRASI SEJARAH -->
                    <img src="https://images.unsplash.com/photo-1550572017-edd951aa8f72?q=80&w=1000&auto=format&fit=crop" alt="Sejarah Wijaya Farma" class="foto-sejarah">
                </div>
            </div>

            <!-- KOLOM KANAN: TEKS SEJARAH -->
            <div class="col-lg-7 ps-lg-5">
                <h2 class="judul-sejarah">Perjalanan Kami</h2>
                
                <div class="teks-sejarah">
                    @if(isset($toko->sejarah) && $toko->sejarah != '')
                        <p>{!! nl2br(e($toko->sejarah)) !!}</p>
                    @else
                        <p class="fw-bold" style="color: #2c3e50; font-size: 1.2rem;">
                            Berawal dari sebuah komitmen kecil di tahun 2010, Wijaya Farma didirikan dengan visi sederhana: mendekatkan layanan kesehatan berkualitas kepada masyarakat sekitar.
                        </p>
                        <p>
                            Di awal berdirinya, apotek kami hanya menempati sebuah ruangan kecil dengan fasilitas yang sangat terbatas. Namun, seiring berjalannya waktu, berkat kepercayaan luar biasa dari para pelanggan dan dedikasi tim apoteker profesional kami, Wijaya Farma terus berkembang pesat.
                        </p>
                        <p>
                            Kami mulai melengkapi fasilitas, memperbanyak ketersediaan jenis obat-obatan dari berbagai merek terkemuka, hingga menyediakan alat kesehatan modern untuk memenuhi kebutuhan warga yang semakin kompleks.
                        </p>
                        <p>
                            Kini, Wijaya Farma tidak hanya sekadar tempat membeli obat. Kami telah bertransformasi menjadi pusat layanan kesehatan terpadu. Nilai inti kami tetap sama sejak hari pertama: <strong>"Kesehatan Anda adalah Prioritas Utama Kami"</strong>.
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

<!-- INI PENUTUP YANG BENAR (TANPA HURUF S) -->
@endsection