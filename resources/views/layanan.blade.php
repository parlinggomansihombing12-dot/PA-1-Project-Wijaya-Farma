@extends('layouts.main')

@section('content')
<!-- Google Fonts & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary-green: #1ABC9C;
        --dark-navy: #2c3e50;
        --bg-soft: #f8fafc;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-soft);
    }

    .container-layanan {
        padding: 60px 15px;
    }

    /* Judul Section */
    .section-title {
        font-weight: 800;
        font-size: 2.5rem;
        color: var(--dark-navy);
        margin-bottom: 10px;
    }

    .underline {
        width: 60px;
        height: 4px;
        background: var(--primary-green);
        margin: 0 auto 25px;
        border-radius: 10px;
    }

    /* Card Layanan - Dibuat Lebih Lebar & Mewah */
    .card-layanan {
        background: #ffffff;
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s ease;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card-layanan:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    /* AREA FOTO - DIPERBAIKI: Lebih Tinggi & Fokus Tengah */
    .foto-wrapper {
        width: 100%;
        height: 300px; /* Dipertinggi agar foto nampak jelas */
        overflow: hidden;
        background: #f1f1f1;
        position: relative;
    }

    .foto-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Foto memenuhi kotak tanpa penyet */
        object-position: center; /* Fokus di tengah foto */
        transition: transform 0.5s ease;
    }

    .card-layanan:hover .foto-wrapper img {
        transform: scale(1.05);
    }

    /* Info Content */
    .card-body-layanan {
        padding: 30px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .nama-layanan {
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--dark-navy);
        margin-bottom: 15px;
    }

    .deskripsi-layanan {
        color: #636e72;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 25px;
        flex-grow: 1;
    }

    /* Tombol Tanya Layanan */
    .btn-wa {
        background-color: transparent;
        color: var(--primary-green);
        border: 2px solid var(--primary-green);
        padding: 12px 25px;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
        width: 100%;
    }

    .btn-wa:hover {
        background-color: var(--primary-green);
        color: #ffffff;
    }
</style>

<div class="container container-layanan">
    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="section-title">Layanan <span style="color: var(--primary-green)">Terbaik</span> Kami</h2>
        <div class="underline"></div>
        <p class="text-muted col-lg-6 mx-auto">
            Kami berkomitmen memberikan pelayanan kesehatan yang cepat, tepat, dan terpercaya bagi masyarakat.
        </p>
    </div>

    <!-- Grid Layanan -->
    <div class="row g-4 justify-content-center">
        @forelse($list_layanan as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card-layanan">
                <!-- Bagian Foto -->
                <div class="foto-wrapper">
                    @if($item->foto)
                        <!-- Pastikan path asset benar, gunakan storage atau public sesuai folder Anda -->
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_layanan }}">
                    @else
                        <div class="h-100 w-100 d-flex align-items-center justify-content-center bg-light">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                </div>

                <!-- Bagian Teks -->
                <div class="card-body-layanan">
                    <h5 class="nama-layanan">{{ $item->nama_layanan }}</h5>
                    <p class="deskripsi-layanan">
                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 120) }}
                    </p>
                    <a href="https://wa.me/{{ $toko->whatsapp ?? '' }}?text=Halo Wijaya Farma, saya ingin tanya layanan {{ $item->nama_layanan }}" 
                       target="_blank" class="btn-wa">
                        Tanya Layanan
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted italic">Belum ada data layanan.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection