@extends('layouts.main')
@section('title', 'Profil Kami - Wijaya Farma')

@section('custom-css')
<style>
    /* ================= 1. LATAR BELAKANG HALAMAN (MENGISI AREA KOSONG) ================= */
    /* Ini akan mengisi area yang Anda lingkari dengan gradasi lembut dan pola titik modern */
    body { 
        background: linear-gradient(135deg, #f0f7f6 0%, #e6f2f1 50%, #f0f7f6 100%);
        font-family: 'Inter', sans-serif; 
        overflow-x: hidden; 
    }
    
    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0; width: 100vw; height: 100vh;
        background-image: radial-gradient(rgba(26, 188, 156, 0.15) 1.5px, transparent 1.5px);
        background-size: 25px 25px;
        z-index: -1; 
    }

    /* Container diubah jadi Fluid agar bisa lebih lebar */
    .container-wide {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* ================= 2. HERO SECTION ================= */
    .hero-profil {
        position: relative;
        width: 100vw;
        height: 45vh; 
        min-height: 350px;
        margin-left: calc(-50vw + 50%);
        margin-bottom: 60px; 
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('{{ isset($toko->foto_toko) && $toko->foto_toko != '' ? asset("images/profil/".$toko->foto_toko) : "https://images.unsplash.com/photo-1585435557343-3b092031a831?q=80&w=2000&auto=format&fit=crop" }}') center/cover no-repeat;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to bottom, rgba(26,188,156,0.85), rgba(44,62,80,0.95)); 
        z-index: 1;
    }

    .hero-content { position: relative; z-index: 2; text-align: center; color: white; padding: 0 20px; }
    .hero-title { font-size: 4rem; font-weight: 800; margin-bottom: 10px; text-shadow: 0 4px 15px rgba(0,0,0,0.4); letter-spacing: -1.5px;} 
    .hero-subtitle { font-size: 1.25rem; font-weight: 300; max-width: 800px; margin: 0 auto; opacity: 0.9; } 

    /* ================= 3. KONTEN KIRI (KERTAS PUTIH MEMANJANG) ================= */
    .content-box {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 60px 50px; 
        box-shadow: 0 15px 40px rgba(0,0,0,0.06);
        border-top: 6px solid #1ABC9C; 
        margin-bottom: 30px;
    }
    
    .teks-dinamis { color: #495057; font-size: 1.1rem; line-height: 2; text-align: justify; margin-bottom: 50px; } 
    
    /* Judul Masing-masing Bagian (Sejarah, Visi, Misi) */
    .section-title {
        display: flex;
        align-items: center;
        font-weight: 800;
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 25px;
        border-bottom: 2px solid #eef2f5;
        padding-bottom: 15px;
    }

    .section-icon {
        width: 60px; height: 60px;
        border-radius: 15px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem;
        margin-right: 20px;
    }
    
    .icon-sejarah { background-color: #e8f8f5; color: #1ABC9C; }
    .icon-visi { background-color: #ebf5fb; color: #3498db; }
    .icon-misi { background-color: #fdf2e9; color: #e67e22; }

    /* ================= 4. KONTEN KANAN (PROFIL PEMILIK STICKY) ================= */
    .owner-card {
        background-color: white;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        overflow: hidden;
        border-top: 6px solid #34495e; 
        position: sticky; 
        top: 100px; 
    }
    
    .owner-header { 
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); 
        padding: 50px 30px; 
        text-align: center;
        color: white;
    }
    
    .foto-owner {
        width: 170px; 
        height: 170px; 
        object-fit: cover; 
        border: 6px solid rgba(255,255,255,0.1); 
        background-color: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        margin-bottom: 20px;
    }

    .owner-body { padding: 40px 30px; }
    .info-title { font-size: 0.95rem; font-weight: 700; color: #1ABC9C; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 12px; }
    .info-text { font-size: 1.05rem; color: #596275; line-height: 1.7; margin-bottom: 30px; }
    
    .owner-name { word-wrap: break-word; overflow-wrap: break-word; hyphens: auto; }

    /* Mencegah jarak berlebih di layar HP */
    @media (max-width: 991px) {
        .owner-card { position: static; margin-top: 40px; }
        .content-box { padding: 40px 30px; }
    }
</style>
@endsection

@section('content')

    <!-- ================= 1. HERO SECTION ================= -->
    <div class="hero-profil">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ $toko->nama_toko ?? 'Apotek Wijaya Farma' }}</h1>
            <p class="hero-subtitle">
                "{{ $toko->deskripsi ?? 'Melayani dengan sepenuh hati demi kesehatan Anda dan keluarga tercinta.' }}"
            </p>
        </div>
    </div>

    <!-- Container Lebar agar sisa kanan-kiri tidak terlalu luas -->
    <div class="container-wide pb-5 mb-5">
        <div class="row align-items-start">
            
            <!-- ================= KOLOM KIRI (KONTEN TEKS MEMANJANG) ================= -->
            <div class="col-lg-8 pe-lg-5">
                <div class="content-box">
                    
                    <!-- BAGIAN SEJARAH -->
                    <div class="section-title">
                        <div class="section-icon icon-sejarah"><i class="fas fa-book-open"></i></div>
                        Kisah Berdirinya Apotek
                    </div>
                    <div class="teks-dinamis">
                        @if(isset($toko->sejarah) && $toko->sejarah != '')
                            {!! nl2br(e($toko->sejarah)) !!}
                        @else
                            <p class="text-muted fst-italic">Belum ada data sejarah yang dimasukkan oleh Admin.</p>
                        @endif
                    </div>

                    <!-- BAGIAN VISI -->
                    <div class="section-title">
                        <div class="section-icon icon-visi"><i class="fas fa-eye"></i></div>
                        Visi Kami di Masa Depan
                    </div>
                    <div class="teks-dinamis">
                        @if(isset($toko->visi) && $toko->visi != '')
                            {!! nl2br(e($toko->visi)) !!}
                        @else
                            <p class="text-muted fst-italic">Belum ada data visi yang dimasukkan oleh Admin.</p>
                        @endif
                    </div>

                    <!-- BAGIAN MISI -->
                    <div class="section-title" style="border-bottom: none;"> <!-- Hapus garis bawah di item terakhir -->
                        <div class="section-icon icon-misi"><i class="fas fa-bullseye"></i></div>
                        Langkah & Misi Utama Kami
                    </div>
                    <div class="teks-dinamis mb-0"> <!-- Hapus margin bawah di item terakhir -->
                        @if(isset($toko->misi) && $toko->misi != '')
                            {!! nl2br(e($toko->misi)) !!}
                        @else
                            <p class="text-muted fst-italic">Belum ada data misi yang dimasukkan oleh Admin.</p>
                        @endif
                    </div>

                </div>
            </div>

            <!-- ================= KOLOM KANAN (PROFIL PEMILIK) ================= -->
            <div class="col-lg-4">
                <div class="owner-card">
                    
                    <div class="owner-header">
                        @if(isset($toko->foto_pemilik) && $toko->foto_pemilik != '')
                            <img src="{{ asset('images/profil/' . $toko->foto_pemilik) }}" class="rounded-circle foto-owner" alt="Foto Apoteker">
                        @else
                            <div class="rounded-circle foto-owner mx-auto d-flex align-items-center justify-content-center text-secondary" style="font-size: 5rem;">👨‍⚕️</div>
                        @endif
                        
                        <h3 class="fw-bold text-white mb-2 mt-3 owner-name">{{ $toko->nama_pemilik ?? 'Apoteker / Pemilik' }}</h3>
                        <span class="badge rounded-pill mt-2 text-dark" style="background-color: #e8f8f5; font-size: 0.9rem; padding: 10px 20px; font-weight: 700;">Apoteker Penanggung Jawab</span>
                    </div>

                    <div class="owner-body">
                        <div class="info-title"><i class="fas fa-graduation-cap me-2"></i> Latar Belakang Pendidikan</div>
                        <p class="info-text border-bottom pb-4">
                            {!! nl2br(e($toko->pendidikan_pemilik ?? 'Belum ada data pendidikan.')) !!}
                        </p>

                        <div class="info-title mt-4"><i class="fas fa-briefcase me-2"></i> Pengalaman Profesional</div>
                        <p class="info-text mb-0">
                            {!! nl2br(e($toko->pengalaman_pemilik ?? 'Belum ada data pengalaman.')) !!}
                        </p>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

@endsection