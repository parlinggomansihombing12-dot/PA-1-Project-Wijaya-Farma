@extends('layouts.main')

@section('title', 'Detail ' . $item->nama_obat)

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
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        min-height: 100vh;
    }

    .container-detail {
        max-width: 1100px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    /* Breadcrumb - LEBIH KECIL */
    .breadcrumb-custom {
        margin-bottom: 20px;
        padding: 8px 0;
    }

    .breadcrumb-custom a {
        color: var(--text-muted);
        text-decoration: none;
        font-size: 0.75rem;
        transition: color 0.2s;
    }

    .breadcrumb-custom a:hover {
        color: var(--primary);
    }

    .breadcrumb-custom span {
        color: var(--text-muted);
        font-size: 0.75rem;
        margin: 0 6px;
    }

    .breadcrumb-custom .active {
        color: var(--primary);
        font-weight: 700;
    }

    /* Main Card */
    .detail-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 1px solid #eef2f6;
    }

    /* Image Section - LEBIH RENDAH */
    .image-section {
        background: linear-gradient(145deg, #f8fafc, #f1f5f9);
        padding: 30px;
        text-align: center;
        height: 100%;
        min-height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-image {
        max-width: 100%;
        max-height: 280px;
        object-fit: contain;
        transition: transform 0.3s;
    }

    .product-image:hover {
        transform: scale(1.03);
    }

    .image-placeholder {
        text-align: center;
        color: #94a3b8;
    }

    .image-placeholder i {
        font-size: 3rem;
        margin-bottom: 10px;
        opacity: 0.5;
    }

    .image-placeholder h6 {
        font-size: 0.8rem;
    }

    /* Info Section - PADDING LEBIH KECIL */
    .info-section {
        padding: 30px;
    }

    .category-badge {
        display: inline-block;
        background: rgba(26,188,156,0.1);
        color: var(--primary);
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .product-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .product-stock {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #d1fae5;
        color: #065f46;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .product-stock.out {
        background: #fee2e2;
        color: #991b1b;
    }

    .product-price {
        font-size: 1.6rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e67e22, #f97316);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 15px 0;
    }

    /* Deskripsi - LEBIH KECIL */
    .deskripsi-section {
        margin: 20px 0;
        padding-top: 15px;
        border-top: 1px solid #eef2f6;
    }

    .deskripsi-title {
        font-size: 0.85rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .deskripsi-text {
        font-size: 0.85rem;
        line-height: 1.6;
        color: var(--text-muted);
        text-align: justify;
    }

    /* Info Offline - LEBIH KECIL */
    .offline-info {
        background: #fef3c7;
        border-radius: 16px;
        padding: 15px;
        margin: 15px 0;
        border-left: 3px solid #f59e0b;
    }

    .offline-info h4 {
        font-size: 0.85rem;
        font-weight: 800;
        color: #b45309;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .offline-info p {
        font-size: 0.75rem;
        color: #78350f;
        margin: 0;
        line-height: 1.5;
    }

    /* Tombol Aksi - LEBIH KECIL */
    .action-buttons {
        display: flex;
        gap: 12px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .btn-back {
        background: #f1f5f9;
        color: var(--dark);
        padding: 10px 20px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        border: 1px solid #e2e8f0;
        flex: 1;
        justify-content: center;
    }

    .btn-back:hover {
        background: #e2e8f0;
        transform: translateX(-3px);
        gap: 10px;
    }

    .btn-wa {
        background: linear-gradient(135deg, #25D366, #128c7e);
        color: white;
        padding: 10px 20px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        flex: 1;
        justify-content: center;
    }

    .btn-wa:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(37,211,102,0.3);
        gap: 10px;
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container-detail {
            padding: 15px;
        }
        .product-title {
            font-size: 1.3rem;
        }
        .product-price {
            font-size: 1.4rem;
        }
        .info-section {
            padding: 20px;
        }
        .image-section {
            min-height: 250px;
            padding: 20px;
        }
        .product-image {
            max-height: 200px;
        }
        .action-buttons {
            flex-direction: column;
        }
        .btn-back, .btn-wa {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')

@php
    // Cek apakah user datang dari halaman kategori
    $from_kategori = request()->get('from') == 'kategori';
    
    // Ambil kategori ID jika ada
    $kategori_id = $item->kategori_id ?? null;
    
    // Tentukan URL kembali berdasarkan asal user
    if ($from_kategori) {
        // Jika dari kategori, kembali ke halaman kategori dengan filter yang sama
        $back_url = $kategori_id ? url('/kategori?kategori=' . $kategori_id) : url('/kategori');
        $back_text = 'Kembali ke Katalog Kategori';
        $back_icon = 'fas fa-folder-open';
    } else {
        // Jika dari halaman produk umum, kembali ke halaman produk
        $back_url = route('produk.index');
        $back_text = 'Kembali ke Katalog Produk';
        $back_icon = 'fas fa-store';
    }
    
    // Nomor WhatsApp
    $no_asli = $toko->no_hp ?? '';
    $no_bersih = preg_replace('/[^0-9]/', '', $no_asli);
    if (strlen($no_bersih) > 0 && substr($no_bersih, 0, 1) === '0') {
        $no_wa = '62' . substr($no_bersih, 1);
    } else {
        $no_wa = $no_bersih;
    }
@endphp

<div class="container-detail">
    
    <!-- BREADCRUMB / NAVIGASI -->
    <div class="breadcrumb-custom">
        @if($from_kategori)
            <a href="{{ url('/kategori') }}">🏠 Kategori</a>
            <span>/</span>
            <a href="{{ url('/kategori?kategori=' . $kategori_id) }}">{{ $item->kategori->nama_kategori ?? 'Produk' }}</a>
            <span>/</span>
            <span class="active">{{ $item->nama_obat }}</span>
        @else
            <a href="{{ url('/') }}">🏠 Home</a>
            <span>/</span>
            <a href="{{ route('produk.index') }}">📦 Semua Produk</a>
            <span>/</span>
            <span class="active">{{ $item->nama_obat }}</span>
        @endif
    </div>

    <!-- CARD DETAIL PRODUK -->
    <div class="detail-card">
        <div class="row g-0">
            
            <!-- KOLOM KIRI: GAMBAR -->
            <div class="col-md-5">
                <div class="image-section">
                    @if($item->foto)
                        <img src="{{ asset('images/produk/' . $item->foto) }}" 
                             class="product-image" 
                             alt="{{ $item->nama_obat }}">
                    @else
                        <div class="image-placeholder">
                            <i class="fas fa-pills"></i>
                            <h6>Belum Ada Foto</h6>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- KOLOM KANAN: INFORMASI -->
            <div class="col-md-7">
                <div class="info-section">
                    <div class="category-badge">
                        <i class="fas fa-tag me-1"></i> {{ $item->kategori->nama_kategori ?? 'Kesehatan Umum' }}
                    </div>
                    
                    <h1 class="product-title">{{ $item->nama_obat }}</h1>
                    
                    @if($item->stok > 0)
                        <div class="product-stock">
                            <i class="fas fa-check-circle"></i> Tersedia ({{ $item->stok }} pcs)
                        </div>
                    @else
                        <div class="product-stock out">
                            <i class="fas fa-times-circle"></i> Stok Habis
                        </div>
                    @endif
                    
                    <div class="product-price">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="deskripsi-section">
                        <div class="deskripsi-title">
                            <i class="fas fa-file-alt" style="color: var(--primary);"></i>
                            Informasi & Deskripsi Obat:
                        </div>
                        <div class="deskripsi-text">
                            @if($item->deskripsi)
                                {!! nl2br(e($item->deskripsi)) !!}
                            @else
                                Maaf, deskripsi lengkap mengenai komposisi, indikasi, atau dosis untuk produk ini belum dimasukkan oleh Admin.
                            @endif
                        </div>
                    </div>
                    
                    <!-- Info Offline -->
                    <div class="offline-info">
                        <h4>
                            <i class="fas fa-store"></i> Tersedia Secara Offline
                        </h4>
                        <p>
                            Demi keamanan dan kepatuhan resep, obat ini tidak dijual secara online. 
                            Silakan <strong>kunjungi Apotek Wijaya Farma secara langsung</strong> untuk membelinya.
                        </p>
                    </div>
                    
                    <!-- TOMBOL AKSI -->
                    <div class="action-buttons">
                        <a href="{{ $back_url }}" class="btn-back">
                            <i class="{{ $back_icon }}"></i> {{ $back_text }}
                        </a>
                        
                        @if($no_wa != '')
                            <a href="https://wa.me/{{ $no_wa }}?text=Halo Apotek Wijaya Farma, saya ingin bertanya tentang produk {{ urlencode($item->nama_obat) }}." 
                               target="_blank" class="btn-wa">
                                <i class="fab fa-whatsapp"></i> Tanya via WhatsApp
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>

@endsection