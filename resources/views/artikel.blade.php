@extends('layouts.main')
@section('title', 'Artikel Kesehatan - Wijaya Farma')

@section('custom-css')
<style>
    body { 
        background: linear-gradient(135deg, #f0f9ff 0%, #e8f0f5 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        position: relative;
        min-height: 100vh;
    }
    
    /* Background Pattern */
    body::before {
        content: ''; 
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%;
        background-image: 
            radial-gradient(circle at 10% 90%, rgba(26, 188, 156, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 90% 10%, rgba(52, 152, 219, 0.03) 0%, transparent 50%);
        pointer-events: none; 
        z-index: 0;
    }
    
    /* Floating blobs */
    .bg-blob-2 {
        position: fixed; 
        bottom: -15%; 
        right: -5%; 
        width: 50%; 
        height: 50%;
        background: radial-gradient(ellipse, rgba(26, 188, 156, 0.05) 0%, transparent 70%);
        border-radius: 50%; 
        pointer-events: none; 
        z-index: 0; 
        animation: floatBlob2 40s ease-in-out infinite;
    }
    
    @keyframes floatBlob2 { 
        0%, 100% { transform: translate(0, 0) scale(1); } 
        50% { transform: translate(-4%, -6%) scale(1.12); } 
    }
    
    /* Header Artikel Premium */
    .articles-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 50px 0;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }
    
    .articles-header::before {
        content: ''; 
        position: absolute; 
        top: -50%; 
        right: -20%; 
        width: 60%; 
        height: 200%;
        background: rgba(255,255,255,0.05); 
        transform: rotate(25deg); 
        pointer-events: none;
    }
    
    .articles-header::after {
        content: ''; 
        position: absolute; 
        bottom: 0; 
        left: 0; 
        right: 0; 
        height: 4px;
        background: linear-gradient(90deg, #1abc9c, #f39c12, #1abc9c);
    }
    
    .articles-title { 
        font-size: 2.3rem; 
        font-weight: 800; 
        color: white; 
        margin-bottom: 10px; 
        text-shadow: 0 2px 10px rgba(0,0,0,0.1); 
    }
    .articles-subtitle { 
        color: rgba(255,255,255,0.9); 
        font-size: 1rem; 
    }
    
    /* Container */
    .articles-container-full {
        width: 100%;
        max-width: 100%;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }
    
    /* ============ FLEX LAYOUT ============ */
    .articles-layout {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }
    
    /* ============ SIDEBAR KATEGORI PREMIUM ============ */
    .kategori-sidebar {
        flex: 0 0 280px;
        background: white;
        border-radius: 24px;
        padding: 0;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 100px;
        align-self: flex-start;
        overflow: hidden;
        border: 1px solid #eef2f6;
    }
    
    .sidebar-header {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        padding: 20px;
        color: white;
    }
    
    .sidebar-header h5 {
        font-size: 1.1rem;
        font-weight: 800;
        margin: 0 0 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .sidebar-header p {
        font-size: 0.75rem;
        opacity: 0.85;
        margin: 0;
    }
    
    .kategori-list {
        padding: 16px 12px;
    }
    
    .kategori-artikel-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        margin: 4px 0;
        background: #f8fafc;
        border-radius: 14px;
        font-weight: 550;
        font-size: 0.85rem;
        color: #1e293b;
        text-decoration: none;
        transition: all 0.25s ease;
        border: 1px solid transparent;
    }
    
    .kategori-artikel-link span:first-child {
        font-size: 1.2rem;
    }
    
    .kategori-artikel-link .kat-text {
        flex: 1;
        font-weight: 600;
    }
    
    .kat-count {
        background: #e2e8f0;
        color: #475569;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 30px;
    }
    
    .kategori-artikel-link:hover {
        background: #f0fdf4;
        border-color: #1abc9c40;
        transform: translateX(4px);
    }
    
    .kategori-artikel-link.active {
        background: linear-gradient(135deg, #1abc9c15 0%, #1abc9c08 100%);
        border-color: #1abc9c;
        border-left: 4px solid #1abc9c;
        color: #0f3b2c;
    }
    
    .kategori-artikel-link.active .kat-count {
        background: #1abc9c;
        color: white;
    }
    
    /* Tombol Reset */
    .btn-reset-wrapper {
        padding: 12px;
        border-top: 1px solid #eef2f6;
        margin-top: 8px;
    }
    
    .btn-reset-kategori {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #f1f5f9;
        padding: 10px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 600;
        color: #64748b;
        transition: 0.2s;
    }
    
    .btn-reset-kategori:hover {
        background: #e2e8f0;
        color: #1e293b;
    }
    
    /* ============ KONTEN UTAMA ============ */
    .konten-utama {
        flex: 1;
        min-width: 0;
    }
    
    /* Search Box Premium */
    .search-box-wrapper {
        margin-bottom: 35px;
    }
    
    .search-form {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .search-input-group {
        flex: 1;
        display: flex;
        background: white;
        border-radius: 60px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid #eef2f6;
        transition: all 0.3s;
    }
    
    .search-input-group:focus-within {
        box-shadow: 0 4px 20px rgba(26, 188, 156, 0.1);
        border-color: #1abc9c;
    }
    
    .search-box-artikel {
        flex: 1;
        border: none;
        padding: 14px 20px;
        font-size: 0.9rem;
        outline: none;
        background: transparent;
    }
    
    .btn-search {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        border: none;
        padding: 0 28px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .btn-search:hover {
        background: linear-gradient(135deg, #16a085 0%, #0e7c64 100%);
    }
    
    .btn-reset-search {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 60px;
        padding: 12px 28px;
        color: #64748b;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-reset-search:hover {
        background: #f1f5f9;
        color: #1e293b;
    }
    
    /* Section Title */
    .section-title {
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }
    
    .section-title h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        position: relative;
        display: inline-block;
    }
    
    .section-title h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 40px;
        height: 3px;
        background: linear-gradient(90deg, #1abc9c, #f39c12);
        border-radius: 3px;
    }
    
    .article-count {
        background: white;
        padding: 6px 16px;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }
    
    /* ============ GRID ARTIKEL - 3 KOLOM ============ */
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }
    
    /* ============ CARD ARTIKEL - TIDAK GEPENG ============ */
    .article-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #eef2f6;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.2);
        border-color: #1abc9c40;
    }
    
    /* Image Container - Tinggi Proporsional */
    .article-image {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
    }
    
    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .article-card:hover .article-image img {
        transform: scale(1.08);
    }
    
    /* Overlay Gradient */
    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
    }
    
    /* Category Tag Premium */
    .category-tag {
        position: absolute;
        top: 16px;
        left: 16px;
        background: linear-gradient(135deg, #1abc9c, #16a085);
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        color: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        z-index: 2;
        letter-spacing: 0.5px;
    }
    
    /* Badge Baru/Terbaru */
    .badge-new {
        position: absolute;
        top: 16px;
        right: 16px;
        background: #f39c12;
        color: white;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        z-index: 2;
        box-shadow: 0 2px 10px rgba(243,156,18,0.3);
    }
    
    /* Content */
    .article-content {
        padding: 20px 22px 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    /* Meta Info */
    .article-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 14px;
        font-size: 0.7rem;
        color: #94a3b8;
        flex-wrap: wrap;
    }
    
    .article-date, .article-author {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    /* Title */
    .article-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 14px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.2s;
    }
    
    .article-card:hover .article-title {
        color: #1abc9c;
    }
    
    /* Excerpt - Lebih panjang agar tidak gepeng */
    .article-excerpt {
        font-size: 0.85rem;
        color: #475569;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
        min-height: 65px;
    }
    
    /* Footer dengan Tombol */
    .article-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        padding-top: 16px;
        border-top: 1px solid #f1f5f9;
    }
    
    .read-more {
        color: #1abc9c;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s;
    }
    
    .read-more:hover {
        gap: 14px;
        color: #0e7c64;
    }
    
    /* Empty State */
    .empty-state-artikel {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 32px;
        margin: 20px 0;
    }
    
    /* Animasi */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .article-card {
        animation: fadeInUp 0.5s ease forwards;
    }
    
    /* ============ RESPONSIVE ============ */
    @media (max-width: 1200px) {
        .articles-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 992px) {
        .kategori-sidebar {
            flex: 0 0 260px;
        }
    }
    
    @media (max-width: 768px) {
        .articles-container-full {
            padding: 0 16px;
        }
        
        .articles-layout {
            flex-direction: column;
        }
        
        .kategori-sidebar {
            flex: 0 0 auto;
            position: static;
            width: 100%;
        }
        
        .kategori-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .kategori-artikel-link {
            flex: 0 0 auto;
            margin: 0;
        }
        
        .articles-grid {
            grid-template-columns: 1fr;
        }
        
        .articles-title {
            font-size: 1.8rem;
        }
        
        .search-form {
            flex-direction: column;
        }
        
        .btn-reset-search {
            text-align: center;
            justify-content: center;
        }
        
        .article-image {
            height: 200px;
        }
        
        .article-title {
            font-size: 1rem;
        }
        
        .article-excerpt {
            font-size: 0.8rem;
            min-height: 60px;
        }
    }
    
    @media (min-width: 769px) and (max-width: 900px) {
        .articles-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection

@section('content')
<div class="bg-blob-2"></div>

<!-- Header -->
<div class="articles-header">
    <div class="articles-container-full">
        <h1 class="articles-title">📚 Artikel Kesehatan</h1>
        <p class="articles-subtitle">Informasi terbaru seputar kesehatan, obat-obatan, dan gaya hidup sehat</p>
    </div>
</div>

<div class="articles-container-full pb-5">
    <div class="articles-layout">
        
        <!-- ============ SIDEBAR KATEGORI PREMIUM ============ -->
        <aside class="kategori-sidebar">
            <div class="sidebar-header">
                <h5>
                    📂 Kategori
                </h5>
                <p>Telusuri artikel berdasarkan topik</p>
            </div>
            
            <div class="kategori-list">
                <a href="/artikel" class="kategori-artikel-link {{ empty($kategori_aktif) && empty(request('cari')) ? 'active' : '' }}">
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
            
            <!-- Tombol reset jika ada filter aktif -->
            @if($kategori_aktif || request('cari'))
            <div class="btn-reset-wrapper">
                <a href="/artikel" class="btn-reset-kategori">
                    🔄 Reset Filter
                </a>
            </div>
            @endif
        </aside>
        
        <!-- ============ KONTEN UTAMA ============ -->
        <main class="konten-utama">
            
            <!-- Search Box Premium -->
            <div class="search-box-wrapper">
                <form action="/artikel" method="GET" class="search-form">
                    @if($kategori_aktif) 
                        <input type="hidden" name="kategori" value="{{ $kategori_aktif }}"> 
                    @endif
                    <div class="search-input-group">
                        <input type="text" name="cari" class="search-box-artikel" 
                               placeholder="Cari judul atau topik artikel..." 
                               value="{{ request('cari') }}">
                        <button type="submit" class="btn-search">
                            🔍 Cari
                        </button>
                    </div>
                    @if(request('cari') || $kategori_aktif)
                        <a href="/artikel" class="btn-reset-search">
                            🔄 Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- Section Title -->
            <div class="section-title">
                <h3>{{ $kategori_aktif ? 'Kategori: ' . $kategori_aktif : (request('cari') ? 'Hasil Pencarian: "' . request('cari') . '"' : 'Artikel Terbaru') }}</h3>
                <div class="article-count">
                    📊 {{ $list_artikel->count() }} artikel
                </div>
            </div>
            
            <!-- GRID ARTIKEL - DESAIN CARD TIDAK GEPENG -->
            <div class="articles-grid">
                @forelse($list_artikel as $index => $item)
                <div class="article-card" style="animation-delay: {{ $index * 0.05 }}s">
                    
                    <!-- Gambar dengan overlay -->
                    <div class="article-image">
                        @if($item->foto && file_exists(public_path('images/artikel/' . $item->foto)))
                            <img src="{{ asset('images/artikel/' . $item->foto) }}" alt="{{ $item->judul }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=600&auto=format&fit=crop" alt="Artikel Kesehatan">
                        @endif
                        <div class="image-overlay"></div>
                        <div class="category-tag">{{ $item->kategori_artikel ?? 'Kesehatan' }}</div>
                        
                        <!-- Badge baru untuk artikel 7 hari terakhir -->
                        @if($item->created_at && $item->created_at->diffInDays(now()) <= 7)
                            <div class="badge-new">✨ BARU</div>
                        @endif
                    </div>

                    <div class="article-content">
                        <!-- Meta Info -->
                        <div class="article-meta">
                            <span class="article-date">
                                📅 {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru saja' }}
                            </span>
                            <span class="article-author">
                                ✍️ {{ $item->penulis ?? 'Admin Wijaya Farma' }}
                            </span>
                        </div>
                        
                        <!-- Title -->
                        <div class="article-title">{{ $item->judul }}</div>
                        
                        <!-- Excerpt - Lebih panjang -->
                        <div class="article-excerpt">
                            {{ Str::limit(strip_tags($item->konten), 120) }}
                        </div>
                        
                        <!-- Footer -->
                        <div class="article-footer">
                            <a href="{{ route('artikel.show', $item->id) }}" class="read-more">
                                Baca Selengkapnya 
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
                @empty
                <div class="empty-state-artikel">
                    <div style="font-size: 64px; margin-bottom: 20px;">📭</div>
                    <h4 class="text-muted fw-bold mb-2">Belum Ada Artikel</h4>
                    <p class="text-muted">Maaf, artikel untuk kategori atau pencarian ini belum tersedia.</p>
                    <a href="/artikel" class="btn btn-cari mt-3" style="display: inline-block; width: auto; padding: 10px 30px; border-radius: 60px; background: linear-gradient(135deg, #1abc9c, #16a085); color: white; text-decoration: none;">
                        🔄 Lihat Semua Artikel
                    </a>
                </div>
                @endforelse
            </div>
            
        </main>
        
    </div>
</div>

<script>
    // Floating particles animation
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        for(let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.width = Math.random() * 4 + 2 + 'px';
            particle.style.height = particle.style.width;
            particle.style.backgroundColor = 'rgba(26, 188, 156, 0.12)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '0';
            particle.style.animation = `floatBlob ${20 + Math.random() * 20}s infinite ease-in-out`;
            particle.style.animationDelay = Math.random() * 10 + 's';
            body.appendChild(particle);
        }
    });
</script>

<style>
    @keyframes floatBlob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(15px, 10px) scale(1.3); }
    }
</style>
@endsection