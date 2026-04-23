@extends('layouts.main')
@section('title', 'Artikel Kesehatan - Wijaya Farma')

@section('custom-css')
<style>
    body { 
        background: linear-gradient(135deg, #e8f0f5 0%, #dce6ed 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        position: relative;
        min-height: 100vh;
    }
    
    /* Background Pattern halus */
    body::before {
        content: ''; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background-image: 
            radial-gradient(circle at 10% 90%, rgba(26, 188, 156, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 90% 10%, rgba(52, 152, 219, 0.03) 0%, transparent 50%),
            repeating-linear-gradient(45deg, rgba(0,0,0,0.008) 0px, rgba(0,0,0,0.008) 1px, transparent 1px, transparent 20px);
        pointer-events: none; z-index: 0;
    }
    
    /* Floating blobs subtle */
    body::after {
        content: ''; position: fixed; top: -20%; left: -10%; width: 60%; height: 60%;
        background: radial-gradient(ellipse, rgba(26, 188, 156, 0.04) 0%, transparent 70%);
        border-radius: 50%; pointer-events: none; z-index: 0; animation: floatBlob 35s ease-in-out infinite;
    }
    
    .bg-blob-2 {
        position: fixed; bottom: -15%; right: -5%; width: 50%; height: 50%;
        background: radial-gradient(ellipse, rgba(241, 196, 15, 0.03) 0%, transparent 70%);
        border-radius: 50%; pointer-events: none; z-index: 0; animation: floatBlob2 40s ease-in-out infinite;
    }
    
    @keyframes floatBlob { 0%, 100% { transform: translate(0, 0) scale(1); } 50% { transform: translate(3%, 5%) scale(1.08); } }
    @keyframes floatBlob2 { 0%, 100% { transform: translate(0, 0) scale(1); } 50% { transform: translate(-4%, -6%) scale(1.12); } }
    
    /* Header Artikel */
    .articles-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 60px 0 50px; margin-bottom: 50px; position: relative; overflow: hidden;
    }
    
    .articles-header::before {
        content: ''; position: absolute; top: -50%; right: -20%; width: 60%; height: 200%;
        background: rgba(255,255,255,0.05); transform: rotate(25deg); pointer-events: none;
    }
    
    .articles-header::after {
        content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px;
        background: linear-gradient(90deg, #1abc9c, #f39c12, #1abc9c);
    }
    
    .articles-title { font-size: 2.5rem; font-weight: 800; color: white; margin-bottom: 10px; text-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .articles-subtitle { color: rgba(255,255,255,0.9); font-size: 1.1rem; }
    
    /* Container utama */
    .articles-container { position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 0 30px; }
    
    /* ========== SIDEBAR KATEGORI DIGESER KE KIRI ========== */
    .kategori-sidebar {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        border-radius: 28px;
        padding: 20px 18px;
        margin-bottom: 30px;
        margin-left: -20px; /* DIGESER KE KIRI */
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(26, 188, 156, 0.1);
        border: 1px solid rgba(255,255,255,0.6);
        position: sticky;
        top: 100px;
        transition: all 0.3s ease;
    }
    
    .kategori-sidebar h5 {
        font-size: 1rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 20px;
        padding-left: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        letter-spacing: -0.2px;
    }
    
    .kategori-sidebar h5:before {
        content: '✦';
        font-size: 1.2rem;
        color: #1abc9c;
    }
    
    /* Grup tombol kategori */
    .kategori-grid {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    /* TOMBOL KATEGORI */
    .kategori-artikel-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 60px;
        font-weight: 550;
        font-size: 0.85rem;
        color: #1e293b;
        text-decoration: none;
        transition: all 0.25s ease;
        border: 1px solid rgba(203, 213, 225, 0.4);
        backdrop-filter: blur(2px);
        box-shadow: 0 1px 2px rgba(0,0,0,0.02);
    }
    
    .kategori-artikel-link span:first-child {
        font-size: 1.1rem;
        filter: drop-shadow(0 1px 1px rgba(0,0,0,0.1));
        transition: transform 0.2s ease;
    }
    
    .kategori-artikel-link .kat-text {
        flex: 1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .kat-count {
        background: #e2e8f0;
        color: #334155;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 40px;
        transition: all 0.2s;
        margin-left: auto;
    }
    
    .kategori-artikel-link:hover {
        background: #ffffff;
        border-color: #1abc9c;
        transform: translateX(4px) translateY(-1px);
        box-shadow: 0 10px 20px -8px rgba(26, 188, 156, 0.25);
    }
    
    .kategori-artikel-link:hover span:first-child {
        transform: scale(1.08);
    }
    
    .kategori-artikel-link.active {
        background: linear-gradient(105deg, #1abc9c08 0%, #1abc9c15 100%);
        border-color: #1abc9c;
        border-left: 3px solid #1abc9c;
        border-radius: 60px;
        box-shadow: 0 6px 12px -8px rgba(26, 188, 156, 0.3);
        font-weight: 700;
        color: #0f3b2c;
    }
    
    .kategori-artikel-link.active span:first-child {
        color: #1abc9c;
        text-shadow: 0 0 2px rgba(26,188,156,0.3);
    }
    
    /* ========== TATA LETAK CARD YANG TIDAK BIASA (MASONRY STYLE) ========== */
    .articles-grid {
        column-count: 2;
        column-gap: 24px;
    }
    
    .grid-item {
        break-inside: avoid;
        margin-bottom: 24px;
        animation: fadeInUp 0.5s ease forwards;
    }
    
    /* Variasi ukuran card yang berbeda-beda */
    .article-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        display: flex;
        flex-direction: column;
        box-shadow: 0 8px 25px -12px rgba(0, 0, 0, 0.12);
        border: 1px solid rgba(226, 232, 240, 0.8);
        position: relative;
    }
    
    .article-card:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 25px 35px -16px rgba(0, 0, 0, 0.2);
        border-color: #1abc9c40;
    }
    
    /* Tinggi gambar yang bervariasi (tidak seragam) */
    .article-image {
        overflow: hidden;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
        position: relative;
    }
    
    /* Setiap card memiliki tinggi gambar berbeda (diproses via inline style atau random class) */
    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .article-card:hover .article-image img {
        transform: scale(1.04);
    }
    
    .category-tag {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255,255,255,0.96);
        backdrop-filter: blur(6px);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 800;
        color: #1abc9c;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        z-index: 2;
    }
    
    .article-content {
        padding: 18px 20px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .article-date {
        font-size: 0.7rem;
        color: #94a3b8;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        letter-spacing: -0.2px;
    }
    
    .article-title {
        font-size: 1.05rem;
        font-weight: 750;
        color: #0f172a;
        margin-bottom: 10px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .article-excerpt {
        font-size: 0.8rem;
        color: #475569;
        line-height: 1.5;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .article-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid #f1f5f9;
    }
    
    .read-more {
        color: #1abc9c;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: 0.25s;
    }
    
    .read-more:hover {
        gap: 12px;
        color: #0e7c64;
    }
    
    /* Pencarian */
    .search-box-artikel {
        border-radius: 40px;
        padding: 14px 25px;
        border: 1px solid #e2e8f0;
        background-color: #ffffff;
        width: 100%;
        transition: 0.3s;
        box-shadow: 0 6px 14px rgba(0,0,0,0.02);
        font-size: 0.9rem;
    }
    
    .search-box-artikel:focus {
        border-color: #1ABC9C;
        outline: none;
        box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.1);
    }
    
    .section-title {
        margin-bottom: 28px;
        padding-bottom: 8px;
        border-bottom: 2px dashed #cbd5e1;
    }
    
    .section-title h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #1e293b;
        background: linear-gradient(135deg, #1e293b, #2d3a4b);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Responsive: masonry jadi 1 kolom di tablet */
    @media (max-width: 768px) {
        .articles-grid {
            column-count: 1;
        }
        .kategori-sidebar {
            margin-left: 0;
        }
    }
    
    @media (max-width: 992px) {
        .articles-container { padding: 0 20px; }
    }
</style>
@endsection

@section('content')
<div class="bg-blob-2"></div>

<!-- Header -->
<div class="articles-header">
    <div class="articles-container">
        <h1 class="articles-title">📚 Artikel Kesehatan</h1>
        <p class="articles-subtitle">Informasi terbaru seputar kesehatan, obat-obatan, dan gaya hidup sehat</p>
    </div>
</div>

<div class="articles-container pb-5">
    <div class="row g-4">
        
        <!-- SIDEBAR KIRI (digeser ke kiri) -->
        <div class="col-lg-3">
            <div class="kategori-sidebar">
                <h5>Kategori Artikel</h5>
                
                <div class="kategori-grid">
                    <a href="/artikel" class="kategori-artikel-link {{ empty($kategori_aktif) ? 'active' : '' }}">
                        <span>📰</span>
                        <span class="kat-text">Semua Artikel</span>
                        @if(isset($total_artikel_count) && $total_artikel_count > 0)
                            <span class="kat-count">{{ $total_artikel_count }}</span>
                        @endif
                    </a>
                    
                    @foreach($kategori_unik ?? [] as $kat)
                        @if($kat->kategori_artikel != '')
                            <a href="/artikel?kategori={{ urlencode($kat->kategori_artikel) }}" class="kategori-artikel-link {{ $kategori_aktif == $kat->kategori_artikel ? 'active' : '' }}">
                                <span>🏷️</span>
                                <span class="kat-text">{{ $kat->kategori_artikel }}</span>
                                @php
                                    $count = isset($kategori_counts[$kat->kategori_artikel]) ? $kategori_counts[$kat->kategori_artikel] : 0;
                                @endphp
                                @if($count > 0)
                                    <span class="kat-count">{{ $count }}</span>
                                @endif
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- KONTEN UTAMA DENGAN MASONRY GRID -->
        <div class="col-lg-9">
            
            <!-- Kotak Pencarian -->
            <form action="/artikel" method="GET" class="position-relative mb-4">
                @if($kategori_aktif) <input type="hidden" name="kategori" value="{{ $kategori_aktif }}"> @endif
                <input type="text" name="cari" class="search-box-artikel" placeholder="Cari judul atau topik artikel..." value="{{ request('cari') }}">
                <button type="submit" class="btn position-absolute" style="right: 12px; top: 10px; color: #1ABC9C;"><i class="fas fa-search"></i></button>
            </form>

            <div class="section-title">
                <h3>📖 {{ $kategori_aktif ? 'Kategori: ' . $kategori_aktif : 'Artikel Terbaru' }}</h3>
            </div>
            
            <!-- MASONRY STYLE GRID - tata letak tidak biasa seperti Pinterest -->
            <div class="articles-grid">
                @forelse($list_artikel as $index => $item)
                <div class="grid-item" style="animation-delay: {{ $index * 0.04 }}s">
                    <div class="article-card">
                        
                        <!-- Gambar dengan tinggi bervariasi (diatur via style inline acak berdasarkan index) -->
                        <div class="article-image" style="height: {{ [180, 210, 195, 230, 170, 200, 220, 190][$index % 8] }}px;">
                            @if($item->foto)
                                <img src="{{ asset('images/artikel/' . $item->foto) }}" alt="{{ $item->judul }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=600&auto=format&fit=crop" alt="Artikel Kesehatan">
                            @endif
                            <div class="category-tag">{{ $item->kategori_artikel ?? 'Kesehatan Umum' }}</div>
                        </div>

                        <div class="article-content">
                            <div class="article-date">
                                <span>📅</span> {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru saja' }} &nbsp;|&nbsp; ✍️ {{ $item->penulis ?? 'Admin' }}
                            </div>
                            
                            <div class="article-title">{{ $item->judul }}</div>
                            
                            <div class="article-excerpt">
                                {{ Str::limit(strip_tags($item->konten), 100) }}
                            </div>
                            
                            <div class="article-footer">
                                <a href="{{ route('artikel.show', $item->id) }}" class="read-more">
                                    Baca Selengkapnya <span>→</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @empty
                
                <div class="col-12">
                    <div class="text-center py-5 bg-white rounded-4 shadow-sm" style="min-height: 300px;">
                        <h1 class="display-1 opacity-25 mb-3">📭</h1>
                        <h4 class="text-muted fw-bold">Belum Ada Artikel</h4>
                        <p class="text-muted">Maaf, artikel untuk kategori atau pencarian ini belum tersedia.</p>
                        <a href="/artikel" class="btn btn-outline-success rounded-pill px-4 mt-3">Lihat Semua Artikel</a>
                    </div>
                </div>

                @endforelse
            </div>
            
        </div>
        
    </div>
</div>
@endsection