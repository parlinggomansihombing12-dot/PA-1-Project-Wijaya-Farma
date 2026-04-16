@extends('layouts.main')
@section('title', 'Profil Kami - Wijaya Farma')

@section('custom-css')
<style>
    body { background-color: #f8fcfb; font-family: 'Inter', sans-serif; overflow-x: hidden; }
    
    /* HERO: Foto Latar Belakang */
    .hero-profil {
        position: relative;
        width: 100vw;
        height: 50vh;
        min-height: 400px;
        margin-left: calc(-50vw + 50%);
        margin-bottom: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* Logika Foto: Jika ada foto di DB, pakai itu. Jika tidak, pakai foto dummy Unsplash */
        background: url('{{ isset($toko->foto_toko) && $toko->foto_toko != '' ? asset("images/profil/".$toko->foto_toko) : "https://images.unsplash.com/photo-1585435557343-3b092031a831?q=80&w=2000&auto=format&fit=crop" }}') center/cover no-repeat;
    }

    .hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to bottom, rgba(26,188,156,0.85), rgba(44,62,80,0.9));
        z-index: 1;
    }

    .hero-content { position: relative; z-index: 2; text-align: center; color: white; padding: 0 20px; }
    .hero-title { font-size: 3.5rem; font-weight: 800; margin-bottom: 15px; text-shadow: 0 4px 10px rgba(0,0,0,0.3); }
    .hero-subtitle { font-size: 1.2rem; font-weight: 300; max-width: 700px; margin: 0 auto; opacity: 0.9; }

    /* SEJARAH & KARTU */
    .judul-section { color: #2c3e50; font-weight: 800; font-size: 2.2rem; margin-bottom: 20px; text-align: center; }
    .teks-sejarah { color: #596275; font-size: 1.1rem; line-height: 1.8; text-align: center; max-width: 800px; margin: 0 auto; }

    .card-vm {
        border: none;
        border-radius: 20px;
        padding: 40px;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: 0.3s;
    }
    .card-vm:hover { transform: translateY(-10px); }
    .card-visi { border-top: 5px solid #3498db; }
    .card-misi { border-top: 5px solid #1ABC9C; }
    .vm-icon { font-size: 3rem; margin-bottom: 20px; }
</style>
@endsection

@section('content')

    <!-- HERO SECTION (FOTO TOKO FULL WIDTH) -->
    <div class="hero-profil">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ $toko->nama_toko ?? 'Apotek Wijaya Farma' }}</h1>
            <p class="hero-subtitle">
                "{{ $toko->deskripsi ?? 'Melayani dengan sepenuh hati demi kesehatan Anda dan keluarga tercinta.' }}"
            </p>
        </div>
    </div>

    <div class="container pb-5">
        
        <!-- SEJARAH TOKO -->
        <div class="mb-5">
            <h2 class="judul-section">Perjalanan Kami</h2>
            <div class="teks-sejarah">
                @if(isset($toko->sejarah) && $toko->sejarah != '')
                    <p>{!! nl2br(e($toko->sejarah)) !!}</p>
                @else
                    <p>Berdiri dengan komitmen kuat untuk memajukan kesehatan masyarakat sekitar. Kami memulai langkah kecil yang kini berkembang menjadi pusat pelayanan kesehatan terpercaya yang menyediakan obat-obatan lengkap dan asli.</p>
                @endif
            </div>
        </div>

        <!-- VISI & MISI -->
        <div class="row mt-5 pt-4">
            <!-- VISI -->
            <div class="col-md-6 mb-4">
                <div class="card-vm card-visi text-center bg-white">
                    <div class="vm-icon">👁️</div>
                    <h3 class="fw-bold" style="color: #3498db;">Visi Kami</h3>
                    <p class="text-muted mt-3" style="line-height: 1.7;">
                        @if(isset($toko->visi) && $toko->visi != '')
                            {!! nl2br(e($toko->visi)) !!}
                        @else
                            Menjadi apotek pilihan utama masyarakat yang dikenal karena kualitas pelayanan, kelengkapan produk, dan inovasi dalam edukasi kesehatan.
                        @endif
                    </p>
                </div>
            </div>

            <!-- MISI -->
            <div class="col-md-6 mb-4">
                <div class="card-vm card-misi text-center bg-white">
                    <div class="vm-icon">🎯</div>
                    <h3 class="fw-bold" style="color: #1ABC9C;">Misi Kami</h3>
                    <p class="text-muted mt-3" style="line-height: 1.7;">
                        @if(isset($toko->misi) && $toko->misi != '')
                            {!! nl2br(e($toko->misi)) !!}
                        @else
                            1. Menyediakan obat-obatan asli dan berkualitas.<br>
                            2. Memberikan pelayanan ramah, cepat, dan solutif.<br>
                            3. Mengedukasi masyarakat tentang pentingnya kesehatan.
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- ================= BAGIAN BARU: PROFIL PEMILIK ================= -->
        @if(isset($toko->nama_pemilik) && $toko->nama_pemilik != '')
        <div class="row justify-content-center mt-5 pt-5 border-top">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden; background-color: #ffffff;">
                    <div class="row g-0 align-items-center">
                        
                        <!-- Foto Pemilik (Kiri) -->
                        <div class="col-md-5 text-center p-5" style="background: linear-gradient(135deg, #e8f8f5 0%, #f4f7f6 100%);">
                            @if(isset($toko->foto_pemilik) && $toko->foto_pemilik != '')
                                <img src="{{ asset('images/profil/' . $toko->foto_pemilik) }}" class="rounded-circle shadow mb-4" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid white;" alt="Foto Apoteker">
                            @else
                                <div class="rounded-circle shadow mb-4 mx-auto d-flex align-items-center justify-content-center" style="width: 200px; height: 200px; background-color: white; font-size: 5rem; color: #1ABC9C;">👨‍⚕️</div>
                            @endif
                            <h4 class="fw-bold text-dark mb-1">{{ $toko->nama_pemilik }}</h4>
                            <span class="badge py-2 px-3 mt-2" style="background-color: #1ABC9C; font-size: 0.85rem;">Pemilik / Apoteker</span>
                        </div>

                        <!-- Detail Profil (Kanan) -->
                        <div class="col-md-7">
                            <div class="card-body p-4 p-md-5">
                                
                                <h5 class="fw-bold mb-3" style="color: #2C3E50;">
                                    <i class="fas fa-graduation-cap me-2 text-primary"></i>Latar Belakang Pendidikan
                                </h5>
                                <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.6;">
                                    {!! nl2br(e($toko->pendidikan_pemilik ?? 'Belum ada data pendidikan.')) !!}
                                </p>

                                <hr class="mb-4">

                                <h5 class="fw-bold mb-3" style="color: #2C3E50;">
                                    <i class="fas fa-briefcase me-2 text-success"></i>Pengalaman Profesional
                                </h5>
                                <p class="text-muted mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                                    {!! nl2br(e($toko->pengalaman_pemilik ?? 'Belum ada data pengalaman.')) !!}
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>

@endsection