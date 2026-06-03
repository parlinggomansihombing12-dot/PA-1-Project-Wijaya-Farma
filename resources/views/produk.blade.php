@extends('layouts.main')

@section('title', 'Semua Produk - Wijaya Farma')

@section('custom-css')
<style>
    body { 
        background: linear-gradient(135deg, #f0f9ff 0%, #e8f0f5 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        position: relative;
        min-height: 100vh;
    }
    
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20% 80%, rgba(26, 188, 156, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(52, 152, 219, 0.03) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }
    
    .product-header, .produk-wrapper {
        position: relative;
        z-index: 2;
    }

    /* HEADER SECTION */
    .product-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 45px 0;
        margin-bottom: 35px;
        position: relative;
        overflow: hidden;
    }

    .product-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #f39c12, #e67e22, #f39c12);
    }

    .section-title {
        font-weight: 800;
        color: white;
        margin-bottom: 12px;
        font-size: 2.3rem;
    }

    .product-header p {
        color: rgba(255,255,255,0.9);
        font-size: 1rem;
    }

    /* SEARCH BAR */
    .search-wrapper {
        max-width: 500px;
        margin: 0 auto;
    }

    .search-box {
        border-radius: 60px;
        padding: 12px 22px;
        border: none !important;
        background: white;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        font-size: 0.9rem;
        flex: 1;
    }

    .btn-cari {
        background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        color: white;
        border-radius: 60px;
        padding: 10px 30px;
        font-weight: 700;
        border: none;
        margin-left: 12px;
        transition: 0.3s;
    }

    .btn-cari:hover {
        transform: translateY(-2px);
        color: white;
    }

    /* ============ WRAPPER FULL WIDTH ============ */
    .produk-wrapper {
        width: 100%;
        padding: 0 20px;
        margin: 0 auto;
    }

    /* ============ GRID 5 KOLOM ============ */
    .produk-flex {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .produk-item {
        flex: 0 0 20%;     /* 5 kolom */
        max-width: 20%;
        padding: 0 10px;
        margin-bottom: 20px;
    }

    /* ============ PRODUCT CARD - DESAIN GE PENG & PROPORSIONAL ============ */
    .product-card {
        background: white;
        border-radius: 16px;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        overflow: hidden;
        position: relative;
        border: 1px solid #eef2f6;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.1);
    }

    /* Badge kategori */
    .category-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(0,0,0,0.7);
        backdrop-filter: blur(4px);
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 600;
        color: white;
        z-index: 2;
    }

    /* Image Container - Lebih pendek agar card tidak terlalu tinggi */
    .img-container {
        height: 140px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fafcff;
        padding: 12px;
    }

    .img-container img {
        max-width: 85%;
        max-height: 100px;
        object-fit: contain;
    }

    /* Content Area */
    .product-content {
        padding: 12px 12px 14px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    /* NAMA PRODUK */
    .product-name {
        font-size: 0.95rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 38px;
    }

    /* INFO HARGA */
    .product-price {
        font-size: 1.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e67e22, #f97316);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        letter-spacing: -0.2px;
    }

    /* ============ STOK - DIPERBESAR & JELAS ============ */
    .stock-wrapper {
        background: #f8fafc;
        border-radius: 12px;
        padding: 8px 10px;
        margin: 4px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 6px;
    }

    .stock-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stock-value {
        font-size: 1.1rem;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .stock-value.stock-good {
        color: #15803d;
    }

    .stock-value.stock-low {
        color: #b45309;
    }

    .stock-value.stock-out {
        color: #b91c1c;
    }

    /* Tombol Detail */
    .btn-detail {
        background: #f1f5f9;
        color: #1e293b;
        text-align: center;
        padding: 8px 0;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.75rem;
        transition: 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        margin-top: 4px;
    }

    .btn-detail:hover {
        background: linear-gradient(135deg, #2a5298, #1e3c72);
        color: white;
    }

    /* Empty State */
    .empty-state-full {
        text-align: center;
        padding: 50px 20px;
        background: rgba(255,255,255,0.9);
        border-radius: 40px;
        width: 100%;
    }

    /* Animasi */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .product-card {
        animation: fadeInUp 0.4s ease forwards;
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 1200px) {
        .produk-item {
            flex: 0 0 25%;   /* 4 kolom */
            max-width: 25%;
        }
    }
    
    @media (max-width: 992px) {
        .produk-item {
            flex: 0 0 33.333%; /* 3 kolom */
            max-width: 33.333%;
        }
    }
    
    @media (max-width: 768px) {
        .produk-wrapper {
            padding: 0 15px;
        }
        .produk-item {
            flex: 0 0 50%;    /* 2 kolom */
            max-width: 50%;
        }
        .stock-value {
            font-size: 1rem;
        }
    }
    
    @media (max-width: 480px) {
        .produk-item {
            flex: 0 0 100%;   /* 1 kolom */
            max-width: 100%;
        }
        .section-title {
            font-size: 1.8rem;
        }
    }

    .d-flex {
        display: flex;
    }
</style>
@endsection

@section('content')

<!-- HEADER & SEARCH -->
<div class="product-header">
    <div class="container text-center">
        <h1 class="section-title">✨ Katalog Produk ✨</h1>
        <p class="mb-3">Temukan obat-obatan berkualitas untuk kesehatan keluarga anda</p>
        
        <div class="search-wrapper">
            <form action="{{ url('/produk') }}" method="GET" class="d-flex justify-content-center">
                <input type="text" name="cari" class="form-control search-box shadow-none" 
                       placeholder="Cari nama obat atau kategori..." value="{{ request('cari') }}">
                <button type="submit" class="btn btn-cari shadow-sm">
                    🔍 Cari
                </button>
            </form>
        </div>
    </div>
</div>

<!-- PRODUCT GRID - 5 KOLOM -->
<div class="produk-wrapper">
    <div class="produk-flex">
        @forelse($list_produk as $index => $item)
        <div class="produk-item">
            <div class="product-card" style="animation-delay: {{ $index * 0.02 }}s">
                <!-- Badge Kategori -->
                <div class="category-badge">
                    📁 {{ $item->kategori->nama_kategori ?? 'Umum' }}
                </div>

                <div class="img-container">
                    @if($item->foto)
                        <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="no-image">
                    @endif
                </div>

                <div class="product-content">
                    <!-- Nama Produk -->
                    <div class="product-name">{{ $item->nama_obat }}</div>

                    <!-- Harga -->
                    <div class="product-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                    <!-- STOK - DIPERBESAR & JELAS -->
                    @php
                        $stockClass = '';
                        $stockIcon = '✅';
                        $stockText = $item->stok . ' tersedia';
                        
                        if($item->stok <= 0) {
                            $stockClass = 'stock-out';
                            $stockIcon = '❌';
                            $stockText = 'HABIS';
                        } elseif($item->stok <= 5) {
                            $stockClass = 'stock-low';
                            $stockIcon = '⚠️';
                            $stockText = 'SISA ' . $item->stok;
                        } else {
                            $stockClass = 'stock-good';
                            $stockIcon = '📦';
                            $stockText = $item->stok . ' tersedia';
                        }
                    @endphp
                    
                    <div class="stock-wrapper">
                        <span class="stock-label">📊 STOK</span>
                        <span class="stock-value {{ $stockClass }}">
                            {{ $stockIcon }} {{ $stockText }}
                        </span>
                    </div>

                    <a href="/produk/{{ $item->id }}" class="btn-detail">
                        👁️ Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state-full">
            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="mb-3 opacity-50">
            <h4 class="text-muted mb-2">🌿 Obat tidak ditemukan</h4>
            <p class="text-muted small">Coba gunakan kata kunci pencarian yang lain.</p>
            <a href="{{ url('/produk') }}" class="btn btn-cari btn-reset mt-2">
                🔄 Reset Pencarian
            </a>
        </div>
        @endforelse
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        for(let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'bg-particle';
            particle.style.position = 'fixed';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.width = Math.random() * 4 + 2 + 'px';
            particle.style.height = particle.style.width;
            particle.style.backgroundColor = 'rgba(26, 188, 156, 0.12)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '0';
            particle.style.animation = `floatBlob ${10 + Math.random() * 15}s infinite ease-in-out`;
            body.appendChild(particle);
        }
    });
</script>

<style>
    .bg-particle {
        position: fixed;
        pointer-events: none;
        z-index: 0;
    }
    
    @keyframes floatBlob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(5px, 8px) scale(1.1); }
    }
</style>

@endsection