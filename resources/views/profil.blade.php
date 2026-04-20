@extends('layouts.main')
@section('title', 'Profil Kami - Wijaya Farma')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d5f5e3;
        --secondary: #2c3e50;
        --secondary-dark: #1a2634;
        --accent: #e67e22;
        --text-dark: #1a2634;
        --text-muted: #5a6e7a;
        --bg-soft: #f0f9f7;
        --white: #ffffff;
        --shadow-sm: 0 10px 30px rgba(0,0,0,0.08);
        --shadow-md: 0 20px 40px rgba(0,0,0,0.1);
        --shadow-lg: 0 30px 60px rgba(0,0,0,0.12);
    }

    body {
        background: linear-gradient(145deg, #eefcf8 0%, #e2f0ec 100%);
        font-family: 'Inter', 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    /* Background Pattern Modern */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.06"><path fill="none" stroke="%231ABC9C" stroke-width="1" d="M10 10 L90 10 M10 20 L90 20 M10 30 L90 30 M10 40 L90 40 M10 50 L90 50 M10 60 L90 60 M10 70 L90 70 M10 80 L90 80 M10 90 L90 90 M20 10 L20 90 M30 10 L30 90 M40 10 L40 90 M50 10 L50 90 M60 10 L60 90 M70 10 L70 90 M80 10 L80 90"/><circle cx="25" cy="25" r="2.5" fill="%231ABC9C"/><circle cx="75" cy="75" r="2.5" fill="%231ABC9C"/><circle cx="50" cy="50" r="2" fill="%231ABC9C"/></svg>');
        background-repeat: repeat;
        background-size: 50px;
        z-index: -1;
    }

    .container-wide {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* ================= HERO SECTION PREMIUM ================= */
    .hero-profil {
        position: relative;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
        min-height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #1a2634 0%, #2c3e50 100%);
        overflow: hidden;
    }

    .hero-profil::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('{{ isset($toko->foto_toko) && $toko->foto_toko != '' ? asset("images/profil/".$toko->foto_toko) : "https://images.unsplash.com/photo-1585435557343-3b092031a831?q=80&w=2000&auto=format&fit=crop" }}') center/cover no-repeat;
        opacity: 0.35;
        filter: blur(3px);
        transform: scale(1.05);
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(26,188,156,0.88) 0%, rgba(44,62,80,0.94) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 0 20px;
        animation: fadeInUp 0.8s ease;
    }

    .hero-title {
        font-size: 3.8rem;
        font-weight: 800;
        color: white;
        margin-bottom: 15px;
        letter-spacing: -1px;
        text-shadow: 0 2px 15px rgba(0,0,0,0.2);
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255,255,255,0.95);
        max-width: 700px;
        margin: 0 auto;
        font-weight: 400;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        padding: 12px 28px;
        border-radius: 60px;
        display: inline-block;
    }

    /* ================= CARDS MODERN ================= */
    .content-box {
        background: var(--white);
        border-radius: 32px;
        padding: 45px 40px;
        box-shadow: var(--shadow-md);
        margin-bottom: 35px;
        transition: all 0.35s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .content-box:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 30px;
        padding-bottom: 18px;
        border-bottom: 2px solid #eef2f5;
    }

    .section-icon {
        width: 65px;
        height: 65px;
        background: linear-gradient(145deg, var(--primary), var(--primary-dark));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        box-shadow: 0 10px 20px rgba(26,188,156,0.25);
    }

    .section-title h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--secondary);
        margin: 0;
        letter-spacing: -0.3px;
    }

    .teks-dinamis {
        color: var(--text-muted);
        font-size: 1.02rem;
        line-height: 1.85;
        text-align: justify;
        margin-bottom: 40px;
        padding-left: 18px;
        border-left: 4px solid var(--primary);
    }

    .teks-dinamis:last-child {
        margin-bottom: 0;
    }

    /* ================= KARTU PEMILIK PREMIUM ================= */
    .owner-card {
        background: var(--white);
        border-radius: 32px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        position: sticky;
        top: 100px;
        transition: all 0.35s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .owner-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .owner-header {
        background: linear-gradient(145deg, var(--secondary), var(--secondary-dark));
        padding: 45px 30px 40px;
        text-align: center;
        position: relative;
    }

    .owner-header::after {
        content: '';
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: var(--primary);
        border-radius: 10px;
    }

    .foto-owner {
        width: 160px;
        height: 160px;
        object-fit: cover;
        border: 5px solid rgba(255,255,255,0.25);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        margin-bottom: 20px;
        transition: transform 0.3s;
    }

    .foto-owner:hover {
        transform: scale(1.02);
    }

    .owner-name {
        font-size: 1.6rem;
        font-weight: 700;
        color: white;
        margin-bottom: 12px;
        word-break: break-word;
    }

    .badge-owner {
        background: rgba(26,188,156,0.2);
        backdrop-filter: blur(8px);
        padding: 8px 20px;
        border-radius: 40px;
        font-size: 0.85rem;
        font-weight: 500;
        color: white;
        display: inline-block;
        border: 1px solid rgba(255,255,255,0.2);
    }

    .owner-body {
        padding: 35px 28px;
    }

    .info-title {
        font-size: 0.82rem;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-title i {
        font-size: 1rem;
    }

    .info-text {
        font-size: 0.98rem;
        color: var(--text-muted);
        line-height: 1.7;
        margin-bottom: 28px;
        padding-bottom: 25px;
        border-bottom: 1px solid #eef2f5;
    }

    .info-text:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    /* ================= ANIMASI ================= */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(35px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .content-box, .owner-card {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    .content-box {
        animation-delay: 0.1s;
    }

    .owner-card {
        animation-delay: 0.2s;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 991px) {
        .owner-card {
            position: static;
            margin-top: 35px;
        }
        .content-box {
            padding: 35px 28px;
        }
        .hero-title {
            font-size: 2.5rem;
        }
        .hero-subtitle {
            font-size: 0.95rem;
            padding: 8px 20px;
        }
        .section-title h2 {
            font-size: 1.4rem;
        }
        .section-icon {
            width: 52px;
            height: 52px;
            font-size: 1.4rem;
        }
    }

    @media (max-width: 768px) {
        .container-wide {
            padding: 0 20px;
        }
        .teks-dinamis {
            font-size: 0.94rem;
            padding-left: 14px;
        }
        .section-title {
            gap: 12px;
        }
    }
</style>
@endsection

@section('content')

    <!-- HERO SECTION PREMIUM -->
    <div class="hero-profil">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ $toko->nama_toko ?? 'Wijaya Farma' }}</h1>
            <div class="hero-subtitle">
                <i class="fas fa-quote-left me-2"></i>
                {{ $toko->deskripsi ?? 'Melayani dengan sepenuh hati demi kesehatan Anda dan keluarga tercinta.' }}
                <i class="fas fa-quote-right ms-2"></i>
            </div>
        </div>
    </div>

    <div class="container-wide py-5 my-4">
        <div class="row g-5 align-items-start">
            
            <!-- KOLOM KIRI: SEJARAH, VISI, MISI -->
            <div class="col-lg-8">
                <!-- CARD SEJARAH -->
                <div class="content-box">
                    <div class="section-title">
                        <div class="section-icon"><i class="fas fa-landmark"></i></div>
                        <h2>Kisah Berdirinya</h2>
                    </div>
                    <div class="teks-dinamis">
                        @if(isset($toko->sejarah) && $toko->sejarah != '')
                            {!! nl2br(e($toko->sejarah)) !!}
                        @else
                            <p class="text-muted fst-italic">
                                <i class="fas fa-pen me-2"></i>Belum ada data sejarah yang dimasukkan oleh Admin.
                            </p>
                        @endif
                    </div>
                </div>

                <!-- CARD VISI -->
                <div class="content-box">
                    <div class="section-title">
                        <div class="section-icon"><i class="fas fa-eye"></i></div>
                        <h2>Visi Kami</h2>
                    </div>
                    <div class="teks-dinamis">
                        @if(isset($toko->visi) && $toko->visi != '')
                            {!! nl2br(e($toko->visi)) !!}
                        @else
                            <p class="text-muted fst-italic">
                                <i class="fas fa-pen me-2"></i>Belum ada data visi yang dimasukkan oleh Admin.
                            </p>
                        @endif
                    </div>
                </div>

                <!-- CARD MISI -->
                <div class="content-box">
                    <div class="section-title">
                        <div class="section-icon"><i class="fas fa-bullseye"></i></div>
                        <h2>Misi & Komitmen</h2>
                    </div>
                    <div class="teks-dinamis">
                        @if(isset($toko->misi) && $toko->misi != '')
                            {!! nl2br(e($toko->misi)) !!}
                        @else
                            <p class="text-muted fst-italic">
                                <i class="fas fa-pen me-2"></i>Belum ada data misi yang dimasukkan oleh Admin.
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: PROFIL PEMILIK -->
            <div class="col-lg-4">
                <div class="owner-card">
                    <div class="owner-header">
                        @if(isset($toko->foto_pemilik) && $toko->foto_pemilik != '')
                            <img src="{{ asset('images/profil/' . $toko->foto_pemilik) }}" 
                                 class="rounded-circle foto-owner" 
                                 alt="Foto Apoteker">
                        @else
                            <div class="rounded-circle foto-owner mx-auto d-flex align-items-center justify-content-center" 
                                 style="background: rgba(255,255,255,0.15); font-size: 4rem;">
                                👨‍⚕️
                            </div>
                        @endif
                        <h3 class="owner-name">{{ $toko->nama_pemilik ?? 'Apoteker' }}</h3>
                        <span class="badge-owner">
                            <i class="fas fa-certificate me-1"></i> Apoteker Penanggung Jawab
                        </span>
                    </div>

                    <div class="owner-body">
                        <div class="info-title">
                            <i class="fas fa-graduation-cap"></i> Pendidikan
                        </div>
                        <div class="info-text">
                            {!! nl2br(e($toko->pendidikan_pemilik ?? 'Belum ada data pendidikan.')) !!}
                        </div>

                        <div class="info-title">
                            <i class="fas fa-briefcase"></i> Pengalaman
                        </div>
                        <div class="info-text">
                            {!! nl2br(e($toko->pengalaman_pemilik ?? 'Belum ada data pengalaman.')) !!}
                        </div>

                        <div class="info-title">
                            <i class="fas fa-phone-alt"></i> Kontak
                        </div>
                        <div class="info-text">
                            <i class="fab fa-whatsapp me-2 text-success"></i> 
                            {{ $toko->whatsapp ?? '+62 XXX XXXX XXXX' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection