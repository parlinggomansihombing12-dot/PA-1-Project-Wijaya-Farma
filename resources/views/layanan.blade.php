@extends('layouts.main')

@section('content')
<!-- Google Fonts: Inter -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #1ABC9C;
        --secondary: #2980B9;
        --text-dark: #1e272e;
        --text-muted: #57606f;
        --bg-body: #f1f2f6;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-body);
    }

    /* Layout Full Width */
    .wide-container {
        max-width: 96%;
        margin: 0 auto;
        padding: 50px 0;
    }

    /* Header Section */
    .header-box {
        margin-bottom: 80px;
    }

    .header-box h2 {
        font-weight: 800;
        font-size: 3rem;
        color: var(--text-dark);
        letter-spacing: -1.5px;
    }

    .line-gradient {
        width: 100px;
        height: 6px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        margin: 25px auto;
        border-radius: 50px;
    }

    /* Service Card Modern */
    .premium-card {
        background: #ffffff;
        border: none;
        border-radius: 35px;
        padding: 50px 30px;
        height: 100%;
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .premium-card:hover {
        transform: translateY(-20px);
        box-shadow: 0 40px 80px rgba(26, 188, 156, 0.12);
    }

    /* FOTO DIPERBESAR (Sekarang 220px) */
    .image-wrapper {
        width: 220px; /* Ukuran diperbesar */
        height: 220px; /* Ukuran diperbesar */
        margin-bottom: 40px;
        border-radius: 50px; /* Sudut melengkung yang modern */
        overflow: hidden;
        background: #fff;
        padding: 10px; /* Memberikan border putih di dalam */
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        transition: 0.5s;
    }

    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 40px; /* Mengikuti lengkungan wrapper */
    }

    .premium-card:hover .image-wrapper {
        transform: scale(1.08) rotate(-3deg);
        box-shadow: 0 20px 45px rgba(26, 188, 156, 0.2);
    }

    /* Typography */
    .card-title {
        font-weight: 800;
        font-size: 1.6rem;
        color: var(--text-dark);
        margin-bottom: 18px;
    }

    .card-text {
        font-size: 1.05rem;
        color: var(--text-muted);
        line-height: 1.8;
        margin-bottom: 40px;
    }

    /* Button Action - Tanpa Logo WA */
    .btn-custom {
        background: transparent;
        color: var(--secondary);
        border: 3px solid var(--secondary);
        padding: 15px 40px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.4s;
        width: 100%;
    }

    .btn-custom:hover {
        background: var(--secondary);
        color: #fff;
        box-shadow: 0 10px 25px rgba(41, 128, 185, 0.3);
    }

    /* Efek Animasi Muncul Berurutan */
    .fade-up {
        animation: fadeUp 0.8s ease-out forwards;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .image-wrapper { width: 180px; height: 180px; } /* Ukuran sedikit mengecil di HP agar pas */
        .header-box h2 { font-size: 2.2rem; }
    }
</style>

<div class="wide-container">
    <!-- Header -->
    <div class="header-box text-center">
        <h2 class="fade-up">Layanan <span style="color: var(--primary)">Terbaik</span> Kami</h2>
        <div class="line-gradient fade-up"></div>
        <p class="text-muted col-lg-5 mx-auto fs-5 fade-up">
            Dedikasi kami untuk memberikan solusi kesehatan berkualitas tinggi melalui fasilitas modern dan profesionalisme tinggi.
        </p>
    </div>
    
    <!-- Grid -->
    <div class="row g-5 justify-content-center">
        @forelse($list_layanan as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4 fade-up">
            <div class="premium-card">
                
                <!-- Area Foto Besar -->
                <div class="image-wrapper">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_layanan }}">
                    @else
                        <div class="h-100 w-100 d-flex align-items-center justify-content-center bg-light text-muted">
                            <i class="fas fa-hand-holding-medical fa-4x"></i>
                        </div>
                    @endif
                </div>

                <!-- Info Layanan -->
                <h5 class="card-title">{{ $item->nama_layanan }}</h5>
                <p class="card-text">
                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 150) }}
                </p>
                
                <!-- Button (Logo WA sudah dihapus) -->
                <div class="mt-auto w-100">
                    <a href="https://wa.me/{{ $toko->whatsapp ?? '' }}?text=Halo, saya ingin berkonsultasi mengenai layanan {{ $item->nama_layanan }}" 
                       class="btn btn-custom">
                       Tanya Layanan
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="bg-white p-5 rounded-5 shadow-sm d-inline-block">
                <i class="fas fa-stethoscope fa-4x mb-3 text-muted"></i>
                <h4 class="text-muted">Layanan saat ini sedang diperbarui.</h4>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection