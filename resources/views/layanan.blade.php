@extends('layouts.main') {{-- Sesuaikan dengan nama layout master Anda --}}

@section('content')
<!-- FontAwesome untuk ikon yang lebih profesional -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Variabel Warna */
    :root {
        --tema-hijau: #1ABC9C;
        --tema-biru: #2980B9;
        --bg-light: #F8F9FA;
    }

    body {
        background-color: var(--bg-light);
    }

    /* Header Section */
    .section-header {
        padding: 60px 0 40px;
    }

    .line-title {
        width: 60px;
        height: 4px;
        background-color: var(--tema-hijau);
        margin: 15px auto;
        border-radius: 2px;
    }

    /* Card Styling */
    .card-layanan {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(0,0,0,0.03);
    }

    .card-layanan:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(26, 188, 156, 0.15);
        border-color: var(--tema-hijau);
    }

    /* Icon Styling */
    .icon-wrapper {
        width: 90px;
        height: 90px;
        background: rgba(26, 188, 156, 0.1);
        color: var(--tema-hijau);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 25px;
        transition: 0.3s;
    }

    .card-layanan:hover .icon-wrapper {
        background: var(--tema-hijau);
        color: white;
        transform: rotate(10deg);
    }

    /* Button Styling */
    .btn-tanya {
        background-color: white;
        color: var(--tema-biru);
        border: 2px solid var(--tema-biru);
        border-radius: 50px;
        font-weight: 600;
        padding: 10px 25px;
        transition: 0.3s;
    }

    .btn-tanya:hover {
        background-color: var(--tema-biru);
        color: white;
        box-shadow: 0 5px 15px rgba(41, 128, 185, 0.3);
    }

    .service-title {
        color: #2C3E50;
        font-size: 1.25rem;
        letter-spacing: -0.5px;
    }

    .service-desc {
        font-size: 0.95rem;
        color: #7F8C8D;
        line-height: 1.6;
    }
</style>

<div class="container mb-5">
    <!-- Header -->
    <div class="text-center section-header">
        <h2 class="fw-bold text-dark display-6">Layanan <span style="color: var(--tema-hijau)">Kami</span></h2>
        <div class="line-title"></div>
        <p class="text-muted col-md-6 mx-auto">
            Kami berkomitmen memberikan pelayanan kesehatan prima dengan fasilitas modern dan tenaga medis profesional.
        </p>
    </div>
    
    <div class="row g-4 justify-content-center">
        @forelse($list_layanan as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card card-layanan h-100 p-4 shadow-sm bg-white">
                <div class="card-body d-flex flex-column text-center">
                    <!-- Icon Area -->
                    <div class="icon-wrapper">
                        @if($item->ikon)
                            <i class="{{ $item->ikon }}"></i>
                        @else
                            <i class="fas fa-hand-holding-medical"></i>
                        @endif
                    </div>

                    <h5 class="fw-bold service-title mb-3">{{ $item->nama_layanan }}</h5>
                    <p class="service-desc mb-4">
                        {{ $item->deskripsi }}
                    </p>
                    
                    <!-- Button Area -->
                    <div class="mt-auto">
                        <a href="https://wa.me/{{ $toko->whatsapp ?? '' }}?text=Halo, saya ingin tanya layanan {{ $item->nama_layanan }}" 
                           class="btn btn-tanya w-100">
                           <i class="fab fa-whatsapp me-2"></i> Tanya Layanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Belum ada layanan yang tersedia.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection