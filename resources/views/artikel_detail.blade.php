@extends('layouts.main')
@section('title', $artikel->judul . ' - Wijaya Farma')

@section('custom-css')
<style>
    body { background-color: #f8fcfb; }
    
    /* 1. HEADER ARTIKEL (HERO) */
    .detail-header {
        position: relative;
        width: 100vw;
        height: 60vh; /* Gambar memenuhi 60% tinggi layar */
        min-height: 400px;
        margin-left: calc(-50vw + 50%);
        margin-bottom: -100px; /* Menarik konten putih ke atas agar menumpuk foto */
        display: flex;
        align-items: center;
        justify-content: center;
        /* Logika pintar memanggil foto dari DB atau foto dummy */
        background: url('{{ $artikel->foto ? asset("images/artikel/".$artikel->foto) : "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=2000&auto=format&fit=crop" }}') center/cover no-repeat;
    }

    .detail-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.8) 100%);
        z-index: 1;
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        padding: 0 20px;
        max-width: 900px;
        margin-top: 50px;
    }

    .badge-kategori {
        background-color: #1ABC9C;
        color: white;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 20px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .judul-artikel { font-size: 3rem; font-weight: 800; line-height: 1.2; margin-bottom: 20px; text-shadow: 0 4px 10px rgba(0,0,0,0.3); }
    
    .meta-info { font-size: 1.05rem; opacity: 0.9; }
    .meta-info i { color: #1ABC9C; margin-right: 5px; }

    /* 2. KONTEN ARTIKEL (KERTAS PUTIH) */
    .konten-wrapper {
        position: relative;
        z-index: 10;
        background: white;
        border-radius: 20px;
        padding: 60px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        max-width: 900px;
        margin: 0 auto 80px auto;
        border-top: 6px solid #1ABC9C;
    }

    .isi-artikel {
        font-size: 1.15rem;
        line-height: 1.9;
        color: #495057;
        text-align: justify;
    }
    
    /* Mencegah teks panjang tanpa spasi merusak layout */
    .isi-artikel p { word-wrap: break-word; overflow-wrap: break-word; hyphens: auto; }

    /* 3. TOMBOL KEMBALI */
    .btn-kembali {
        display: inline-flex;
        align-items: center;
        padding: 12px 30px;
        background-color: white;
        color: #2c3e50;
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        margin-top: 40px;
    }
    .btn-kembali:hover { background-color: #1ABC9C; color: white; border-color: #1ABC9C; transform: translateX(-5px); }
    .btn-kembali i { margin-right: 10px; }

    @media (max-width: 768px) {
        .judul-artikel { font-size: 2rem; }
        .konten-wrapper { padding: 40px 25px; margin-top: -50px; }
    }
</style>
@endsection

@section('content')

    <!-- ================= 1. HEADER / HERO IMAGE ================= -->
    <div class="detail-header">
        <div class="detail-overlay"></div>
        <div class="header-content">
            <div class="badge-kategori">{{ $artikel->kategori_artikel ?? 'Kesehatan Umum' }}</div>
            <h1 class="judul-artikel">{{ $artikel->judul }}</h1>
            <div class="meta-info">
                <span class="me-4"><i class="fas fa-user-edit"></i> Ditulis oleh: <strong>{{ $artikel->penulis ?? 'Admin Wijaya Farma' }}</strong></span>
                <span><i class="far fa-calendar-alt"></i> Diterbitkan: {{ $artikel->created_at->format('d F Y') }}</span>
            </div>
        </div>
    </div>

   <!-- ================= 2. KONTEN ARTIKEL (KERTAS PUTIH) ================= -->
    <div class="container">
        <div class="konten-wrapper">
            
            <div class="isi-artikel">
                {!! nl2br(e($artikel->konten)) !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center border-top pt-4 mt-5">
                <a href="{{ route('artikel.index') }}" class="btn-kembali">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Artikel
                </a>
            </div>

        </div>
    </div>

@endsection