@extends('layouts.main')
@section('title', $artikel->judul . ' - Wijaya Farma')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
        --shadow-lg: 0 8px 25px rgba(0,0,0,0.08);
    }

    body { 
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        font-family: 'Inter', sans-serif;
    }
    
    /* ================= HEADER ARTIKEL - DIPERKECIL ================= */
    .detail-header {
        position: relative;
        width: 100%;
        height: 45vh;
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('{{ $artikel->foto ? asset("images/artikel/".$artikel->foto) : "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=1600&auto=format&fit=crop" }}') center/cover no-repeat;
    }

    .detail-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.75) 100%);
        z-index: 1;
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
        padding: 0 20px;
        max-width: 800px;
    }

    .badge-kategori {
        background-color: var(--primary);
        color: white;
        padding: 5px 16px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.7rem;
        display: inline-block;
        margin-bottom: 15px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .judul-artikel { 
        font-size: 2rem; 
        font-weight: 800; 
        line-height: 1.3; 
        margin-bottom: 15px; 
        text-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    
    .meta-info { 
        font-size: 0.8rem; 
        opacity: 0.9; 
    }
    .meta-info i { 
        color: var(--primary); 
        margin-right: 5px; 
    }
    .meta-info span {
        margin: 0 12px;
    }

    /* ================= KONTEN ARTIKEL - DIPERKECIL ================= */
    .konten-wrapper {
        position: relative;
        z-index: 10;
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: var(--shadow-md);
        max-width: 850px;
        margin: 0 auto 60px auto;
        border-top: 4px solid var(--primary);
    }

    .isi-artikel {
        font-size: 0.95rem;
        line-height: 1.7;
        color: var(--text-muted);
        text-align: justify;
    }
    
    .isi-artikel p {
        margin-bottom: 18px;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    /* ================= TOMBOL KEMBALI ================= */
    .btn-kembali {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 28px;
        background-color: white;
        color: var(--dark);
        border: 1.5px solid #e2e8f0;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
        transition: all 0.2s ease;
        text-decoration: none;
        margin-top: 30px;
    }
    
    .btn-kembali:hover { 
        background-color: var(--primary); 
        color: white; 
        border-color: var(--primary); 
        transform: translateX(-5px);
        gap: 12px;
    }
    
    .btn-kembali i { 
        font-size: 0.8rem;
    }

    /* ================= SHARE BUTTONS - DIHAPUS ================= */
    /* Share section dan tombol share dihapus total */

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .judul-artikel { 
            font-size: 1.5rem; 
        }
        .detail-header {
            height: 35vh;
            min-height: 280px;
        }
        .konten-wrapper { 
            padding: 25px; 
            margin-bottom: 40px;
        }
        .meta-info span {
            display: block;
            margin: 5px 0;
        }
        .isi-artikel {
            font-size: 0.85rem;
            line-height: 1.6;
        }
        .badge-kategori {
            font-size: 0.6rem;
            padding: 4px 12px;
        }
    }

    @media (max-width: 480px) {
        .judul-artikel {
            font-size: 1.2rem;
        }
        .detail-header {
            height: 30vh;
            min-height: 240px;
        }
        .konten-wrapper {
            padding: 20px;
        }
        .btn-kembali {
            padding: 8px 22px;
            font-size: 0.75rem;
        }
    }
</style>
@endsection

@section('content')

<!-- ================= HEADER / HERO IMAGE ================= -->
<div class="detail-header">
    <div class="detail-overlay"></div>
    <div class="header-content">
        <div class="badge-kategori">{{ $artikel->kategori_artikel ?? 'Kesehatan Umum' }}</div>
        <h1 class="judul-artikel">{{ $artikel->judul }}</h1>
        <div class="meta-info">
            <span><i class="fas fa-user-edit"></i> {{ $artikel->penulis ?? 'Admin Wijaya Farma' }}</span>
            <span><i class="far fa-calendar-alt"></i> {{ $artikel->created_at ? $artikel->created_at->format('d F Y') : date('d F Y') }}</span>
            <span><i class="far fa-clock"></i> {{ $artikel->created_at ? $artikel->created_at->diffForHumans() : 'Baru saja' }}</span>
        </div>
    </div>
</div>

<!-- ================= KONTEN ARTIKEL ================= -->
<div class="container">
    <div class="konten-wrapper">
        
        <div class="isi-artikel">
            {!! nl2br(e($artikel->konten)) !!}
        </div>

        <!-- BAGIKAN ARTIKEL - DIHAPUS -->

        <!-- Tombol Kembali -->
        <div class="text-center">
            @php
                $from_kategori = request()->get('from') == 'kategori';
                $kategori_id = $artikel->kategori_id ?? null;
                
                if ($from_kategori) {
                    $back_url = $kategori_id ? url('/artikel?kategori=' . urlencode($artikel->kategori_artikel)) : url('/artikel');
                    $back_text = 'Kembali ke Kategori Artikel';
                } else {
                    $back_url = route('artikel.index');
                    $back_text = 'Kembali ke Daftar Artikel';
                }
            @endphp
            <a href="{{ $back_url }}" class="btn-kembali">
                <i class="fas fa-arrow-left"></i> {{ $back_text }}
            </a>
        </div>

    </div>
</div>

@endsection