@extends('layouts.main')
@section('title', 'Artikel Kesehatan - Wijaya Farma')

@section('custom-css')
<style>
    body { background-color: #ffffff; }
    
    /* 1. KOTAK PENCARIAN */
    .search-box-artikel {
        border-radius: 30px;
        padding: 10px 20px;
        border: 1px solid #e0e0e0;
        background-color: #fcfcfc;
        width: 100%;
        max-width: 400px;
        transition: 0.3s;
    }
    .search-box-artikel:focus { border-color: var(--tema-hijau); outline: none; background-color: white; box-shadow: 0 0 10px rgba(26, 188, 156, 0.1); }
    
    /* 2. HERO CARD (BAGIAN TERPOPULER) */
    .hero-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        display: block;
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }
    .hero-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
    
    .hero-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .hero-card:hover .hero-img { transform: scale(1.05); }

    /* Gradien Gelap di Bawah Foto */
    .hero-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
        padding: 30px 20px 20px 20px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        height: 60%; /* Gradien hanya menutupi setengah ke bawah */
    }

    /* Ukuran spesifik untuk grid besar dan kecil */
    .hero-large { height: 450px; }
    .hero-small { height: 215px; } /* Setengah dari yang besar minus jarak(gap) */

    .hero-title-large { font-size: 1.5rem; font-weight: 800; margin-bottom: 5px; line-height: 1.3; }
    .hero-title-small { font-size: 1.1rem; font-weight: 700; margin-bottom: 5px; line-height: 1.3; }
    .hero-date { font-size: 0.85rem; opacity: 0.8; }

    /* 3. CARD TERBARU (GRID BAWAH) */
    .artikel-card {
        border: none;
        border-radius: 16px;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    .artikel-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    .img-terbaru { height: 220px; object-fit: cover; width: 100%; }
    .judul-terbaru { font-size: 1.1rem; font-weight: 700; color: #2c3e50; line-height: 1.4; margin-bottom: 10px;}
    .judul-terbaru a { color: inherit; text-decoration: none; transition: 0.2s;}
    .judul-terbaru a:hover { color: var(--tema-hijau); }
    .badge-kategori { background-color: rgba(26,188,156,0.1); color: var(--tema-hijau); font-weight: 600; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem;}

    /* Responsif untuk HP */
    @media (max-width: 991px) {
        .hero-large { height: 300px; margin-bottom: 20px; }
        .hero-small { height: 200px; margin-bottom: 20px; }
        .search-box-artikel { max-width: 100%; margin-top: 15px; }
    }
</style>
@endsection

@section('content')
<div class="container my-5">

    <!-- HEADER: JUDUL & PENCARIAN -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-5">
        <h2 class="fw-bold mb-0" style="color: #2c3e50;">Artikel</h2>
        
        <!-- Form Pencarian -->
        <form action="/artikel" method="GET" class="position-relative">
            <input type="text" name="cari" class="search-box-artikel ps-4" placeholder="Cari artikel kesehatan..." value="{{ request('cari') }}">
            <!-- Ikon kaca pembesar absolute -->
            <i class="fas fa-search position-absolute text-muted" style="right: 15px; top: 12px;"></i>
        </form>
    </div>

    <!-- MENCEGAH ERROR JIKA ARTIKEL KOSONG -->
    @if($list_artikel->isEmpty())
        <div class="text-center py-5">
            <h1 style="font-size: 4rem;">📝</h1>
            <h4 class="text-muted mt-3">Belum ada artikel yang diterbitkan.</h4>
        </div>
    @else

        <!-- ================= BAGIAN 1: TERPOPULER (HERO GRID) ================= -->
        <!-- Kita mengambil 3 artikel pertama untuk diletakkan di atas -->
        <h4 class="fw-bold mb-4" style="color: #2c3e50;">Terpopuler</h4>
        
        <div class="row mb-5">
            <!-- Kolom Kiri Besar (Artikel Ke-1) -->
            @if(isset($list_artikel[0]))
            <div class="col-lg-8 pe-lg-2">
                <a href="{{ route('artikel.show', $list_artikel[0]->id) }}" class="hero-card hero-large">
                    <!-- Catatan: Link unsplash di kode lama Anda sudah mati, saya ganti ke format baru -->
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1000&auto=format&fit=crop" class="hero-img" alt="Artikel">
                    <div class="hero-overlay">
                        <span class="badge-kategori mb-2" style="width: max-content; background: var(--tema-hijau); color: white;">Kesehatan</span>
                        <h3 class="hero-title-large">{{ $list_artikel[0]->judul }}</h3>
                        <div class="hero-date">{{ $list_artikel[0]->created_at?->format('d F Y') ?? 'Baru saja' }}</div>
                    </div>
                </a>
            </div>
            @endif

            <!-- Kolom Kanan Bertumpuk (Artikel Ke-2 & Ke-3) -->
            <div class="col-lg-4 ps-lg-2 mt-4 mt-lg-0">
                <div class="d-flex flex-column justify-content-between h-100">
                    
                    <!-- Artikel Ke-2 -->
                    @if(isset($list_artikel[1]))
                    <a href="{{ route('artikel.show', $list_artikel[1]->id) }}" class="hero-card hero-small mb-3">
                        <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=500&auto=format&fit=crop" class="hero-img" alt="Artikel">
                        <div class="hero-overlay" style="height: 80%;">
                            <h5 class="hero-title-small">{{ $list_artikel[1]->judul }}</h5>
                            <div class="hero-date">{{ $list_artikel[1]->created_at?->format('d F Y') ?? 'Baru saja' }}</div>
                        </div>
                    </a>
                    @endif

                    <!-- Artikel Ke-3 -->
                    @if(isset($list_artikel[2]))
                    <a href="{{ route('artikel.show', $list_artikel[2]->id) }}" class="hero-card hero-small">
                        <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?q=80&w=500&auto=format&fit=crop" class="hero-img" alt="Artikel">
                        <div class="hero-overlay" style="height: 80%;">
                            <h5 class="hero-title-small">{{ $list_artikel[2]->judul }}</h5>
                            <div class="hero-date">{{ $list_artikel[2]->created_at?->format('d F Y') ?? 'Baru saja' }}</div>
                        </div>
                    </a>
                    @endif

                </div>
            </div>
        </div>


        <!-- ================= BAGIAN 2: TERBARU (GRID BAWAH) ================= -->
        <!-- Kita tampilkan sisa artikel mulai dari artikel ke-4 dan seterusnya -->
        @if($list_artikel->count() > 3)
            <h4 class="fw-bold mb-4 mt-5" style="color: #2c3e50;">Terbaru</h4>
            
            <div class="row g-4">
                @foreach($list_artikel as $index => $item)
                    <!-- Trik Blade: Lewati 3 artikel pertama karena sudah tampil di atas -->
                    @if($index > 2)
                    <div class="col-lg-4 col-md-6">
                        <div class="card artikel-card h-100">
                            <!-- Foto Artikel Dummy -->
                            <a href="{{ route('artikel.show', $item->id) }}">
                                <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?q=80&w=500&auto=format&fit=crop" class="img-terbaru" alt="Artikel">
                            </a>
                            
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="mb-3">
                                    <span class="badge-kategori">Edukasi</span>
                                </div>
                                <h5 class="judul-terbaru">
                                    <a href="{{ route('artikel.show', $item->id) }}">{{ $item->judul }}</a>
                                </h5>
                                <p class="text-muted small mt-2 flex-grow-1">
                                    <!-- Menampilkan ringkasan atau memotong konten -->
                                    {{ \Illuminate\Support\Str::limit($item->ringkasan ?? $item->konten, 100) }}
                                </p>
                                <hr class="mt-auto mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted fw-semibold"><i class="far fa-calendar-alt me-1"></i> {{ $item->created_at?->format('d M Y') ?? 'Baru saja' }}</small>
                                    <a href="{{ route('artikel.show', $item->id) }}" class="text-decoration-none fw-bold" style="color: var(--tema-hijau);">Baca <i class="fas fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endif <!-- Penutup if Terpopuler > 3 -->

    @endif <!-- Penutup if Artikel Kosong -->

</div>
@endsection