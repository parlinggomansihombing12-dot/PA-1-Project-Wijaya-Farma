@extends('layouts.main')

@section('title', 'Semua Produk - Wijaya Farma')

@section('custom-css')
<style>
    body { 
        background: linear-gradient(135deg, #f0f9ff 0%, #e8f0f5 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        position: relative;
    }
    
    /* Background Pattern - Subtle Medical/Pharmacy Theme */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 20% 80%, rgba(26, 188, 156, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(52, 152, 219, 0.03) 0%, transparent 50%),
            repeating-linear-gradient(45deg, 
                rgba(26, 188, 156, 0.02) 0px, 
                rgba(26, 188, 156, 0.02) 2px,
                transparent 2px,
                transparent 8px
            );
        pointer-events: none;
        z-index: 0;
    }
    
    /* Floating animated blobs */
    body::after {
        content: '';
        position: fixed;
        top: -50%;
        left: -20%;
        width: 80%;
        height: 80%;
        background: radial-gradient(ellipse, rgba(26, 188, 156, 0.04) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
        animation: floatBlob 20s ease-in-out infinite;
    }
    
    @keyframes floatBlob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(5%, 5%) scale(1.1); }
    }
    
    /* Container biar konten di atas background */
    .product-header, .container {
        position: relative;
        z-index: 2;
    }

    /* HEADER SECTION dengan Background Gradient */
    .product-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 60px 0;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }

    .product-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 70%;
        height: 200%;
        background: rgba(255,255,255,0.05);
        transform: rotate(25deg);
        pointer-events: none;
    }
    
    /* Header pattern tambahan */
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
        margin-bottom: 15px;
        font-size: 2.5rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .product-header p {
        color: rgba(255,255,255,0.9);
        font-size: 1.1rem;
    }

    /* SEARCH BAR */
    .search-wrapper {
        max-width: 550px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .search-box {
        border-radius: 60px;
        padding: 14px 25px;
        border: none !important;
        background: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: 0.3s;
        font-size: 0.95rem;
    }

    .search-box:focus {
        transform: scale(1.02);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
    }

    .btn-cari {
        background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        color: white;
        border-radius: 60px;
        padding: 12px 35px;
        font-weight: 700;
        border: none;
        margin-left: 12px;
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(243,156,18,0.3);
    }

    .btn-cari:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(243,156,18,0.4);
        color: white;
    }

    /* PRODUCT CARD GRID - Desain Premium */
    .product-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(0px);
        border-radius: 24px;
        padding: 0;
        border: 1px solid rgba(255,255,255,0.3);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 12px 28px rgba(0,0,0,0.05);
        overflow: hidden;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 24px 48px rgba(0,0,0,0.12);
        background: white;
        border-color: rgba(26, 188, 156, 0.2);
    }

    /* Badge kategori di pojok */
    .category-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(5px);
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        color: #2a5298;
        letter-spacing: 0.5px;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    /* Image Container dengan background gradien */
    .img-container {
        height: 210px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 20px;
        transition: 0.3s;
    }

    .product-card:hover .img-container {
        background: linear-gradient(145deg, #eef2ff 0%, #e0e7ff 100%);
    }

    .img-container img {
        max-width: 75%;
        max-height: 140px;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .product-card:hover .img-container img {
        transform: scale(1.05);
    }

    /* Content Area */
    .product-content {
        padding: 20px 20px 22px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-size: 1.1rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 12px;
        line-height: 1.4;
        min-height: 52px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Harga & Stok */
    .price-section {
        background: #fef9e8;
        border-radius: 16px;
        padding: 12px 15px;
        margin: 12px 0;
        display: flex;
        justify-content: space-between;
        align-items: baseline;
    }

    .product-price {
        font-size: 1.3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #e67e22, #f39c12);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .product-stock {
        font-size: 12px;
        font-weight: 600;
        background: white;
        padding: 4px 12px;
        border-radius: 40px;
        color: #2d6a4f;
    }

    .stock-low {
        color: #e67e22;
        background: #fff3e0;
    }

    .stock-out {
        color: #dc2626;
        background: #fee2e2;
    }

    /* Tombol Detail */
    .btn-detail {
        background: white;
        color: #2a5298;
        text-align: center;
        padding: 12px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        font-size: 13px;
        transition: 0.3s;
        border: 1.5px solid #e2e8f0;
        margin-top: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-detail:hover {
        background: linear-gradient(135deg, #2a5298, #1e3c72);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        border-radius: 48px;
        margin-top: 20px;
        border: 1px solid rgba(255,255,255,0.5);
    }

    /* Animasi muncul */
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
    
    /* Efek tambahan: particles kecil di background */
    .bg-particle {
        position: fixed;
        width: 4px;
        height: 4px;
        background: rgba(26, 188, 156, 0.2);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }
</style>
@endsection

@section('content')

<!-- HEADER & SEARCH dengan desain baru -->
<div class="product-header">
    <div class="container text-center">
        <h1 class="section-title">✨ Katalog Produk ✨</h1>
        <p class="mb-4">Temukan obat-obatan berkualitas untuk kesehatan keluarga anda</p>
        
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

<!-- PRODUCT GRID dengan tampilan kartu premium -->
<div class="container pb-5">
    <div class="row g-4">
        @forelse($list_produk as $index => $item)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" style="animation-delay: {{ $index * 0.05 }}s">
            <div class="product-card">
                <!-- Badge Kategori -->
                <div class="category-badge">
                    📂 {{ $item->kategori->nama_kategori ?? 'Umum' }}
                </div>

                <div class="img-container">
                    @if($item->foto)
                        <img src="{{ asset('images/produk/' . $item->foto) }}" alt="{{ $item->nama_obat }}">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="no-image">
                    @endif
                </div>

                <div class="product-content">
                    <div class="product-name">{{ $item->nama_obat }}</div>

                    <!-- Area Harga dan Stok -->
                    <div class="price-section">
                        <span class="product-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        
                        @php
                            $stockClass = '';
                            $stockText = 'Stok: ' . $item->stok;
                            if($item->stok <= 0) {
                                $stockClass = 'stock-out';
                                $stockText = '❌ Habis';
                            } elseif($item->stok <= 5) {
                                $stockClass = 'stock-low';
                                $stockText = '⚠️ Stok: ' . $item->stok;
                            }
                        @endphp
                        
                        <div class="product-stock {{ $stockClass }}">
                            {{ $stockText }}
                        </div>
                    </div>

                    <a href="/produk/{{ $item->id }}" class="btn-detail">
                        👁️ Lihat Detail Produk
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="empty-state">
                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="100" class="mb-4 opacity-50">
                <h3 class="text-muted mb-2">🌿 Obat tidak ditemukan</h3>
                <p class="text-muted">Coba gunakan kata kunci pencarian yang lain.</p>
                <a href="{{ url('/produk') }}" class="btn btn-cari mt-3" style="display: inline-block; width: auto; padding: 10px 30px;">
                    🔄 Reset Pencarian
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- JavaScript untuk particles dinamis (opsional) -->
<script>
    // Menambahkan floating particles di background
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        for(let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.className = 'bg-particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.width = Math.random() * 6 + 2 + 'px';
            particle.style.height = particle.style.width;
            particle.style.animation = `floatBlob ${15 + Math.random() * 20}s infinite ease-in-out`;
            particle.style.animationDelay = Math.random() * 10 + 's';
            body.appendChild(particle);
        }
    });
</script>

@endsection