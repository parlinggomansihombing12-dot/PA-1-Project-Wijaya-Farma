@extends('layouts.main')

@section('content')
<!-- Google Fonts & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary-green: #1ABC9C;
        --primary-dark: #16a085;
        --dark-navy: #1a2634;
        --text-muted: #5a6e7a;
        --gradient-start: #e0faf5;
        --gradient-end: #d4e6f1;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
        min-height: 100vh;
    }

    .container-layanan {
        padding: 60px 20px;
    }

    /* Judul Section */
    .section-title {
        font-weight: 800;
        font-size: 2.8rem;
        color: var(--dark-navy);
        margin-bottom: 15px;
        letter-spacing: -0.5px;
    }

    .section-title span {
        background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .underline {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-green), var(--primary-dark));
        margin: 0 auto 25px;
        border-radius: 10px;
    }

    .subtitle {
        color: var(--text-muted);
        font-size: 1.1rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Card Layanan Premium */
    .card-layanan {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(0px);
        border-radius: 28px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .card-layanan:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
        background: #ffffff;
        border-color: transparent;
    }

    /* AREA FOTO - Stunning */
    .foto-wrapper {
        width: 100%;
        height: 260px;
        overflow: hidden;
        background: linear-gradient(145deg, #e2f0ec, #cde2dc);
        position: relative;
    }

    .foto-wrapper::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 60%, rgba(0,0,0,0.05));
        pointer-events: none;
    }

    .foto-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.6s ease;
    }

    .card-layanan:hover .foto-wrapper img {
        transform: scale(1.08);
    }

    /* Badge / Icon Overlay */
    .icon-overlay {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: var(--primary-green);
        width: 45px;
        height: 45px;
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
        box-shadow: 0 5px 15px rgba(26, 188, 156, 0.4);
        z-index: 2;
        transition: 0.3s;
    }

    .card-layanan:hover .icon-overlay {
        transform: scale(1.1);
        background: var(--primary-dark);
    }

    /* Info Content */
    .card-body-layanan {
        padding: 28px 24px 32px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .nama-layanan {
        font-weight: 800;
        font-size: 1.6rem;
        color: var(--dark-navy);
        margin-bottom: 12px;
        letter-spacing: -0.3px;
    }

    .deskripsi-layanan {
        color: var(--text-muted);
        font-size: 0.95rem;
        line-height: 1.65;
        margin-bottom: 28px;
        flex-grow: 1;
    }

    /* Tombol Tanya Layanan - Modern */
    .btn-wa {
        background: linear-gradient(90deg, var(--primary-green), var(--primary-dark));
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        box-shadow: 0 4px 12px rgba(26, 188, 156, 0.25);
    }

    .btn-wa i {
        font-size: 1.1rem;
        transition: transform 0.2s;
    }

    .btn-wa:hover {
        background: linear-gradient(90deg, var(--primary-dark), #0e8d72);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(26, 188, 156, 0.4);
        color: white;
    }

    .btn-wa:hover i {
        transform: translateX(4px);
    }

    /* Empty state styling */
    .empty-state {
        background: rgba(255,255,255,0.6);
        backdrop-filter: blur(8px);
        border-radius: 40px;
        padding: 50px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    /* Animasi muncul */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-layanan {
        animation: fadeUp 0.6s ease forwards;
        opacity: 0;
    }

    .card-layanan:nth-child(1) { animation-delay: 0.1s; }
    .card-layanan:nth-child(2) { animation-delay: 0.2s; }
    .card-layanan:nth-child(3) { animation-delay: 0.3s; }
    .card-layanan:nth-child(4) { animation-delay: 0.4s; }
    .card-layanan:nth-child(5) { animation-delay: 0.5s; }
    .card-layanan:nth-child(6) { animation-delay: 0.6s; }
</style>

<div class="container container-layanan">
    <!-- Header Premium -->
    <div class="text-center mb-5">
        <h2 class="section-title">Layanan <span>Terbaik</span> Kami</h2>
        <div class="underline"></div>
        <p class="subtitle">
            <i class="fas fa-heartbeat me-2" style="color: var(--primary-green);"></i> 
            Kami berkomitmen memberikan pelayanan kesehatan yang cepat, tepat, dan terpercaya bagi masyarakat.
        </p>
    </div>

    <!-- Grid Layanan -->
    <div class="row g-4 justify-content-center">
        @forelse($list_layanan as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card-layanan">
                <!-- Bagian Foto dengan icon overlay -->
                <div class="foto-wrapper">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_layanan }}">
                    @else
                        <div class="h-100 w-100 d-flex align-items-center justify-content-center bg-light">
                            <i class="fas fa-stethoscope fa-4x" style="color: #b2bec3;"></i>
                        </div>
                    @endif
                    <div class="icon-overlay">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                </div>

                <!-- Bagian Teks -->
                <div class="card-body-layanan">
                    <h5 class="nama-layanan">{{ $item->nama_layanan }}</h5>
                    <p class="deskripsi-layanan">
                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 110) }}
                    </p>
                    <a href="https://wa.me/{{ $toko->whatsapp ?? '' }}?text=Halo Wijaya Farma, saya ingin tanya layanan {{ $item->nama_layanan }}" 
                       target="_blank" class="btn-wa">
                        <i class="fab fa-whatsapp"></i> Tanya Layanan
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="empty-state">
                <i class="fas fa-clinic-medical fa-4x mb-3" style="color: var(--primary-green); opacity: 0.7;"></i>
                <h4 class="text-dark">Belum Ada Layanan</h4>
                <p class="text-muted">Layanan kesehatan akan segera hadir untuk Anda.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection