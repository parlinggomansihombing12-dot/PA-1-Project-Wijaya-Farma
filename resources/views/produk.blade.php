@extends('layouts.main')

@section('title', 'Semua Produk - Wijaya Farma')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --secondary: #2c3e50;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 4px 12px rgba(0,0,0,0.05);
        --shadow-md: 0 10px 25px rgba(0,0,0,0.08);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.12);
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f0fdfa 0%, #e6f4f0 100%);
        min-height: 100vh;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.03"><path fill="none" stroke="%231ABC9C" stroke-width="1" d="M10 10 L90 10 M10 20 L90 20 M10 30 L90 30 M10 40 L90 40 M10 50 L90 50 M10 60 L90 60 M10 70 L90 70 M10 80 L90 80 M10 90 L90 90 M20 10 L20 90 M30 10 L30 90 M40 10 L40 90 M50 10 L50 90 M60 10 L60 90 M70 10 L70 90 M80 10 L80 90"/></svg>');
        background-repeat: repeat;
        background-size: 50px;
        pointer-events: none;
        z-index: 0;
    }

    .product-header, .produk-wrapper {
        position: relative;
        z-index: 2;
    }

    /* HEADER SECTION */
    .product-header {
        background: linear-gradient(135deg, #1a2634 0%, #2c3e50 100%);
        padding: 55px 0;
        margin-bottom: 45px;
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
        background: linear-gradient(90deg, var(--primary), var(--accent), var(--primary));
    }

    .section-title {
        font-weight: 800;
        color: white;
        margin-bottom: 15px;
        font-size: 2.5rem;
        letter-spacing: -1px;
    }

    .product-header p {
        color: rgba(255,255,255,0.85);
        font-size: 1rem;
    }

    /* SEARCH BAR PREMIUM */
    .search-wrapper {
        max-width: 700px;
        margin: 0 auto;
    }

    .search-form {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .search-input-group {
        flex: 1;
        display: flex;
        background: white;
        border-radius: 60px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        overflow: hidden;
        transition: all 0.3s;
    }

    .search-input-group:focus-within {
        box-shadow: 0 8px 30px rgba(26,188,156,0.2);
        transform: translateY(-2px);
    }

    .search-box {
        flex: 1;
        border: none !important;
        padding: 14px 24px;
        font-size: 1rem;
        outline: none;
    }

    .btn-cari {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: white;
        border-radius: 0 60px 60px 0;
        padding: 14px 32px;
        font-weight: 700;
        font-size: 1rem;
        border: none;
        transition: 0.3s;
        white-space: nowrap;
        cursor: pointer;
    }

    .btn-cari:hover {
        background: linear-gradient(135deg, #e67e22, #d35400);
        transform: scale(1.02);
    }

    .btn-reset {
        background: white;
        color: #64748b;
        border-radius: 60px;
        padding: 14px 28px;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        transition: 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .btn-reset:hover {
        background: #f1f5f9;
        color: #1e293b;
        transform: translateY(-2px);
    }

    /* ============ WRAPPER - FULL WIDTH TANPA RUANG KOSONG ============ */
    .produk-wrapper {
        width: 100%;
        padding: 0 25px;
        margin: 0 auto;
        max-width: 1600px;
    }

    /* Header Produk */
    .produk-header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .produk-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        position: relative;
    }

    .produk-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        border-radius: 4px;
    }

    .produk-count {
        background: white;
        padding: 10px 24px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--text-muted);
        border: 1px solid #e2e8f0;
        box-shadow: var(--shadow-sm);
    }

    /* ============ GRID 4 KOLOM ============ */
    .produk-flex {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -12px;
    }

    .produk-item {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 0 12px;
        margin-bottom: 24px;
    }

    /* ============ CARD PRODUK PREMIUM ============ */
    .product-card {
        background: white;
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: var(--shadow-md);
        overflow: hidden;
        position: relative;
        border: 1px solid #eef2f6;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary);
    }

    /* Badge kategori */
    .category-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(0,0,0,0.7);
        backdrop-filter: blur(5px);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        color: white;
        z-index: 2;
        letter-spacing: 0.5px;
    }

    /* Image Container */
    .img-container {
        height: 230px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 20px;
        border-bottom: 1px solid #eef2f6;
    }

    .product-card:hover .img-container {
        background: linear-gradient(145deg, #f0fdf4 0%, #e6faf5 100%);
    }

    .img-container img {
        max-width: 90%;
        max-height: 160px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .product-card:hover .img-container img {
        transform: scale(1.08);
    }

    /* Content Area */
    .product-content {
        padding: 20px 22px 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    /* NAMA PRODUK */
    .product-name {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 54px;
    }

    /* HARGA */
    .product-price {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e67e22, #f97316);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 6px 0;
    }

    /* STOK */
    .stock-wrapper {
        background: #f8fafc;
        border-radius: 14px;
        padding: 12px 14px;
        margin: 8px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        border: 1px solid #eef2f6;
    }

    .stock-label {
        font-size: 0.9rem;
        font-weight: 800;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .stock-value {
        font-size: 1rem;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 6px;
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
        margin-top: 8px;
        background: #f1f5f9;
        color: #1e293b;
        text-align: center;
        padding: 14px 0;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 800;
        font-size: 0.9rem;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 1px solid #e2e8f0;
    }

    .btn-detail:hover {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border-color: transparent;
        transform: translateY(-3px);
        gap: 12px;
    }

    /* Empty State */
    .empty-state-full {
        text-align: center;
        padding: 60px 20px;
        background: rgba(255,255,255,0.95);
        border-radius: 40px;
        width: 100%;
    }

    /* Animasi */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .product-card {
        animation: fadeInUp 0.5s ease forwards;
    }

    /* ============ PAGINATION PREMIUM STYLES ============ */
    .pagination-premium {
        margin-top: 30px;
    }
    
    .pagination-premium .pagination {
        margin-bottom: 0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-radius: 50px;
        overflow: hidden;
        justify-content: center;
        gap: 5px;
    }
    
    .pagination-premium .page-link {
        color: var(--dark);
        font-weight: 700;
        padding: 12px 22px;
        border: none;
        background: white;
        border-radius: 50px;
        margin: 0 2px;
        transition: all 0.3s;
    }
    
    .pagination-premium .page-item.active .page-link {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        box-shadow: 0 4px 12px rgba(26,188,156,0.3);
    }
    
    .pagination-premium .page-item.disabled .page-link {
        color: #cbd5e1;
        background-color: white;
        cursor: not-allowed;
    }
    
    .pagination-premium .page-link:hover:not(.active):not(.disabled) {
        background-color: var(--primary-light);
        color: var(--primary);
        transform: translateY(-2px);
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 1200px) {
        .produk-item {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
        .img-container {
            height: 200px;
        }
    }
    
    @media (max-width: 768px) {
        .produk-wrapper {
            padding: 0 20px;
        }
        .produk-item {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .img-container {
            height: 180px;
        }
        .search-form {
            flex-direction: column;
        }
        .search-input-group {
            border-radius: 60px;
        }
        .btn-reset, .btn-cari {
            border-radius: 60px;
        }
        .product-name {
            font-size: 1rem;
        }
        .product-price {
            font-size: 1.3rem;
        }
        .produk-title {
            font-size: 1.5rem;
        }
        .pagination-premium .page-link {
            padding: 8px 16px;
            font-size: 0.85rem;
        }
    }
    
    @media (max-width: 550px) {
        .produk-item {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .section-title {
            font-size: 1.8rem;
        }
        .img-container {
            height: 200px;
        }
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
            <form action="{{ url('/produk') }}" method="GET" class="search-form">
                <div class="search-input-group">
                    <input type="text" name="cari" class="search-box" 
                           placeholder="Cari nama obat atau kategori..." value="{{ request('cari') }}">
                    <button type="submit" class="btn-cari">
                        🔍 Cari
                    </button>
                </div>
                @if(request('cari'))
                <a href="{{ url('/produk') }}" class="btn-reset">
                    🔄 Reset
                </a>
                @endif
            </form>
        </div>
    </div>
</div>

<!-- PRODUCT GRID - 4 KOLOM -->
<div class="produk-wrapper">
    <!-- Header dengan jumlah produk -->
    <div class="produk-header-section">
        <div class="produk-title">
            Semua Produk
        </div>
        <div class="produk-count">
            📊 {{ $list_produk->total() ?? $list_produk->count() }} produk
        </div>
    </div>

    <div class="produk-flex">
        @forelse($list_produk as $index => $item)
        <div class="produk-item">
            <div class="product-card" style="animation-delay: {{ $index * 0.03 }}s">
                <!-- Badge Kategori -->
                <div class="category-badge">
                    📂 {{ $item->kategori->nama_kategori ?? 'Umum' }}
                </div>

                <!-- FOTO PRODUK -->
                <div class="img-container">
                    @if($item->foto)
                        <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="no-image">
                    @endif
                </div>

                <div class="product-content">
                    <div class="product-name">{{ $item->nama_obat }}</div>
                    <div class="product-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

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

                    <a href="/produk/{{ $item->id }}?from=produk" class="btn-detail">
                        👁️ Lihat Detail
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state-full">
            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="mb-3 opacity-50">
            <h4 class="text-muted mb-2">🌿 Obat tidak ditemukan</h4>
            <p class="text-muted small">Coba gunakan kata kunci pencarian yang lain.</p>
            <a href="{{ url('/produk') }}" class="btn-cari mt-2" style="display: inline-block; width: auto; border-radius: 60px;">
                🔄 Reset Pencarian
            </a>
        </div>
        @endforelse
    </div>

    <!-- ============================================================== -->
    <!-- PAGINATION / NAVIGASI HALAMAN -->
    <!-- ============================================================== -->
    @if(method_exists($list_produk, 'links'))
        <div class="pagination-premium d-flex justify-content-center mt-5 pt-4">
            {{ $list_produk->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif

</div> <!-- Penutup produk-wrapper -->

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
        50% { transform: translate(5px, 8px) scale(1.2); }
    }
</style>

@endsection