@extends('layouts.main')
@section('title', 'Artikel Kesehatan - Wijaya Farma')

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
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
        --shadow-lg: 0 8px 25px rgba(0,0,0,0.08);
    }

    body { 
        background: linear-gradient(135deg, #f0f9ff 0%, #e8f0f5 100%);
        font-family: 'Inter', sans-serif;
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
    
    /* Header Artikel - DIPERKECIL */
    .articles-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 35px 0;
        margin-bottom: 35px;
        position: relative;
        overflow: hidden;
    }
    
    .articles-header::after {
        content: ''; 
        position: absolute; 
        bottom: 0; 
        left: 0; 
        right: 0; 
        height: 3px;
        background: linear-gradient(90deg, #1abc9c, #f39c12, #1abc9c);
    }
    
    .articles-title { 
        font-size: 1.8rem; 
        font-weight: 800; 
        color: white; 
        margin-bottom: 8px; 
    }
    .articles-subtitle { 
        color: rgba(255,255,255,0.85); 
        font-size: 0.85rem; 
    }
    
    /* Container */
    .articles-container-full {
        width: 100%;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        z-index: 2;
    }
    
    /* ============ FLEX LAYOUT ============ */
    .articles-layout {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
    }
    
    /* ============ SIDEBAR KATEGORI - LEBIH KECIL ============ */
    .kategori-sidebar {
        flex: 0 0 250px;
        background: white;
        border-radius: 20px;
        padding: 0;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 90px;
        align-self: flex-start;
        overflow: hidden;
        border: 1px solid #eef2f6;
    }
    
    .sidebar-header {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        padding: 15px;
        color: white;
    }
    
    .sidebar-header h5 {
        font-size: 0.9rem;
        font-weight: 800;
        margin: 0 0 3px 0;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .sidebar-header p {
        font-size: 0.65rem;
        opacity: 0.85;
        margin: 0;
    }
    
    .kategori-list {
        padding: 12px;
    }
    
    .kategori-artikel-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        margin: 3px 0;
        background: #f8fafc;
        border-radius: 10px;
        font-weight: 500;
        font-size: 0.75rem;
        color: #1e293b;
        text-decoration: none;
        transition: all 0.2s;
        border: 1px solid transparent;
    }
    
    .kategori-artikel-link span:first-child {
        font-size: 1rem;
    }
    
    .kategori-artikel-link .kat-text {
        flex: 1;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .kat-count {
        background: #e2e8f0;
        color: #475569;
        font-size: 0.6rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 20px;
    }
    
    .kategori-artikel-link:hover {
        background: #f0fdf4;
        border-color: #1abc9c40;
        transform: translateX(3px);
    }
    
    .kategori-artikel-link.active {
        background: linear-gradient(135deg, #1abc9c15 0%, #1abc9c08 100%);
        border-color: #1abc9c;
        border-left: 3px solid #1abc9c;
        color: #0f3b2c;
    }
    
    .kategori-artikel-link.active .kat-count {
        background: #1abc9c;
        color: white;
    }
    
    /* Tombol Reset */
    .btn-reset-wrapper {
        padding: 10px;
        border-top: 1px solid #eef2f6;
        margin-top: 5px;
    }
    
    .btn-reset-kategori {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: #f1f5f9;
        padding: 8px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 0.7rem;
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
    
    /* Search Box - LEBIH KECIL */
    .search-box-wrapper {
        margin-bottom: 25px;
    }
    
    .search-form {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .search-input-group {
        flex: 1;
        display: flex;
        background: white;
        border-radius: 50px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        transition: all 0.2s;
    }
    
    .search-input-group:focus-within {
        box-shadow: 0 2px 10px rgba(26,188,156,0.1);
        border-color: #1abc9c;
    }
    
    .search-box-artikel {
        flex: 1;
        border: none;
        padding: 10px 18px;
        font-size: 0.8rem;
        outline: none;
        background: transparent;
    }
    
    .btn-search {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        border: none;
        padding: 0 22px;
        color: white;
        font-weight: 600;
        font-size: 0.75rem;
        cursor: pointer;
        transition: 0.2s;
    }
    
    .btn-search:hover {
        background: linear-gradient(135deg, #16a085 0%, #0e7c64 100%);
    }
    
    .btn-reset-search {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 50px;
        padding: 9px 22px;
        color: #64748b;
        font-weight: 600;
        font-size: 0.75rem;
        text-decoration: none;
        transition: 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    /* Section Title - LEBIH KECIL */
    .section-title {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .section-title h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        position: relative;
    }
    
    .section-title h3::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        width: 35px;
        height: 2px;
        background: linear-gradient(90deg, #1abc9c, #f39c12);
        border-radius: 2px;
    }
    
    .article-count {
        background: white;
        padding: 4px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }
    
    /* ============ GRID ARTIKEL - 4 KOLOM ============ */
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
    
    /* ============ CARD ARTIKEL - LEBIH KECIL ============ */
    .article-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: #1abc9c40;
    }
    
    /* Image Container */
    .article-image {
        position: relative;
        height: 140px;
        overflow: hidden;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
    }
    
    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .article-card:hover .article-image img {
        transform: scale(1.05);
    }
    
    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 40px;
        background: linear-gradient(to top, rgba(0,0,0,0.4), transparent);
    }
    
    .category-tag {
        position: absolute;
        top: 10px;
        left: 10px;
        background: linear-gradient(135deg, #1abc9c, #16a085);
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.55rem;
        font-weight: 700;
        color: white;
        z-index: 2;
    }
    
    .badge-new {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #f39c12;
        color: white;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.55rem;
        font-weight: 700;
        z-index: 2;
    }
    
    /* Content */
    .article-content {
        padding: 12px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .article-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
        font-size: 0.6rem;
        color: #94a3b8;
        flex-wrap: wrap;
    }
    
    .article-title {
        font-size: 0.85rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 8px;
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 34px;
    }
    
    .article-card:hover .article-title {
        color: #1abc9c;
    }
    
    .article-excerpt {
        font-size: 0.7rem;
        color: #475569;
        line-height: 1.5;
        margin-bottom: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
        min-height: 32px;
    }
    
    .article-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        padding-top: 10px;
        border-top: 1px solid #f1f5f9;
    }
    
    .read-more {
        color: #1abc9c;
        text-decoration: none;
        font-size: 0.65rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s;
    }
    
    .read-more:hover {
        gap: 8px;
        color: #0e7c64;
    }
    
    .read-more svg {
        width: 10px;
        height: 10px;
    }
    
    /* Empty State */
    .empty-state-artikel {
        grid-column: 1 / -1;
        text-align: center;
        padding: 40px;
        background: white;
        border-radius: 20px;
    }
    
    /* Animasi */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .article-card {
        animation: fadeInUp 0.4s ease forwards;
    }
    
    /* ============ RESPONSIVE ============ */
    @media (max-width: 1200px) {
        .articles-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 900px) {
        .articles-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .articles-container-full {
            padding: 0 20px;
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
            font-size: 1.5rem;
        }
        
        .search-form {
            flex-direction: column;
        }
        
        .article-image {
            height: 160px;
        }
        
        .article-title {
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')

<!-- Header -->
<div class="articles-header">
    <div class="articles-container-full">
        <h1 class="articles-title">📚 Artikel Kesehatan</h1>
        <p class="articles-subtitle">Informasi terbaru seputar kesehatan, obat-obatan, dan gaya hidup sehat</p>
    </div>
</div>

<div class="articles-container-full pb-5">
    <div class="articles-layout">
        
        <!-- ============ SIDEBAR KATEGORI ============ -->
        <aside class="kategori-sidebar">
            <div class="sidebar-header">
                <h5>📂 Kategori</h5>
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
                            <span class="kat-text">{{ \Illuminate\Support\Str::limit($kat->kategori_artikel, 20) }}</span>
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
            
            <!-- Search Box -->
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
                <h3>{{ $kategori_aktif ? 'Kategori: ' . \Illuminate\Support\Str::limit($kategori_aktif, 30) : (request('cari') ? 'Hasil: "' . request('cari') . '"' : 'Artikel Terbaru') }}</h3>
                <div class="article-count">
                    📊 {{ $list_artikel->count() }} artikel
                </div>
            </div>
            
            <!-- GRID ARTIKEL - 4 KOLOM -->
            <div class="articles-grid">
                @forelse($list_artikel as $index => $item)
                <div class="article-card" style="animation-delay: {{ $index * 0.03 }}s">
                    
                    <div class="article-image">
                        @if($item->foto && file_exists(public_path('images/artikel/' . $item->foto)))
                            <img src="{{ asset('images/artikel/' . $item->foto) }}" alt="{{ $item->judul }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=400&auto=format&fit=crop" alt="Artikel Kesehatan">
                        @endif
                        <div class="image-overlay"></div>
                        <div class="category-tag">{{ \Illuminate\Support\Str::limit($item->kategori_artikel ?? 'Kesehatan', 15) }}</div>
                        
                        @if($item->created_at && $item->created_at->diffInDays(now()) <= 7)
                            <div class="badge-new">✨ BARU</div>
                        @endif
                    </div>

                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-date">
                                📅 {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru saja' }}
                            </span>
                            <span class="article-author">
                                ✍️ {{ \Illuminate\Support\Str::limit($item->penulis ?? 'Admin', 15) }}
                            </span>
                        </div>
                        
                        <div class="article-title">{{ \Illuminate\Support\Str::limit($item->judul, 50) }}</div>
                        
                        <div class="article-excerpt">
                            {{ Str::limit(strip_tags($item->konten), 80) }}
                        </div>
                        
                        <div class="article-footer">
                            <a href="{{ route('artikel.show', $item->id) }}" class="read-more">
                                Baca Selengkapnya 
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
                @empty
                <div class="empty-state-artikel">
                    <div style="font-size: 48px; margin-bottom: 15px;">📭</div>
                    <h4 class="text-muted mb-2">Belum Ada Artikel</h4>
                    <p class="text-muted small">Maaf, artikel untuk kategori atau pencarian ini belum tersedia.</p>
                    <a href="/artikel" class="btn-search mt-3" style="display: inline-block; background: linear-gradient(135deg, #1abc9c, #16a085); color: white; padding: 8px 24px; border-radius: 50px; text-decoration: none;">
                        🔄 Lihat Semua Artikel
                    </a>
                </div>
                @endforelse
            </div>
            
        </main>
        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        for(let i = 0; i < 15; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.width = Math.random() * 3 + 1 + 'px';
            particle.style.height = particle.style.width;
            particle.style.backgroundColor = 'rgba(26, 188, 156, 0.1)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '0';
            particle.style.animation = `floatParticle ${15 + Math.random() * 20}s infinite ease-in-out`;
            document.body.appendChild(particle);
        }
    });
</script>

<style>
    @keyframes floatParticle {
        0%, 100% { transform: translate(0, 0) scale(1); opacity: 0; }
        50% { transform: translate(10px, -15px) scale(1.3); opacity: 0.3; }
    }
</style>

@endsection