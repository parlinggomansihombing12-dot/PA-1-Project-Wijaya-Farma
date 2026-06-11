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
    
    /* Header Artikel */
    .articles-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 40px 0;
        margin-bottom: 40px;
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
        gap: 30px;
    }
    
    /* ============ SIDEBAR KATEGORI ============ */
    .kategori-sidebar {
        flex: 0 0 260px;
        background: white;
        border-radius: 20px;
        padding: 0;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 100px;
        align-self: flex-start;
        overflow: hidden;
        border: 1px solid #eef2f6;
    }
    
    .sidebar-header {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        padding: 18px 16px;
        color: white;
    }
    
    .sidebar-header h5 {
        font-size: 0.9rem;
        font-weight: 800;
        margin: 0 0 4px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .sidebar-header p {
        font-size: 0.65rem;
        opacity: 0.85;
        margin: 0;
    }
    
    .kategori-list {
        padding: 16px 12px;
    }
    
    .kategori-artikel-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        margin: 4px 0;
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
        white-space: normal;
        line-height: 1.35;
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
        padding: 12px;
        border-top: 1px solid #eef2f6;
        margin-top: 8px;
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
    
    /* Search Box */
    .search-box-wrapper {
        margin-bottom: 30px;
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
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        transition: all 0.2s;
    }
    
    .search-input-group:focus-within {
        box-shadow: 0 4px 15px rgba(26,188,156,0.1);
        border-color: #1abc9c;
    }
    
    .search-box-artikel {
        flex: 1;
        border: none;
        padding: 12px 20px;
        font-size: 0.85rem;
        outline: none;
        background: transparent;
    }
    
    .btn-search {
        background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
        border: none;
        padding: 0 28px;
        color: white;
        font-weight: 600;
        font-size: 0.8rem;
        cursor: pointer;
        transition: 0.2s;
    }
    
    .btn-search:hover {
        background: linear-gradient(135deg, #16a085 0%, #0e7c64 100%);
    }
    
    .btn-reset-search {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 60px;
        padding: 10px 24px;
        color: #64748b;
        font-weight: 600;
        font-size: 0.75rem;
        text-decoration: none;
        transition: 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
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
        font-size: 1.2rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        position: relative;
    }
    
    .section-title h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 40px;
        height: 2px;
        background: linear-gradient(90deg, #1abc9c, #f39c12);
        border-radius: 2px;
    }
    
    .article-count {
        background: white;
        padding: 5px 16px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }
    
    /* ============ GRID ARTIKEL - 3 KOLOM ============ */
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }
    
    /* ============ CARD ARTIKEL ============ */
    .article-card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.35s ease;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .article-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-md);
        border-color: #1abc9c;
    }
    
    /* Image Container */
    .article-image {
        position: relative;
        height: 180px;
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
        height: 50px;
        background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
    }
    
    .category-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        background: linear-gradient(135deg, #1abc9c, #16a085);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.6rem;
        font-weight: 700;
        color: white;
        z-index: 2;
    }
    
    .badge-new {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #f39c12;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.55rem;
        font-weight: 700;
        z-index: 2;
    }
    
    /* Content */
    .article-content {
        padding: 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .article-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 10px;
        font-size: 0.65rem;
        color: #94a3b8;
        flex-wrap: wrap;
    }
    
    .article-date, .article-author {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .article-title {
        font-size: 0.95rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 10px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 42px;
    }
    
    .article-card:hover .article-title {
        color: #1abc9c;
    }
    
    .article-excerpt {
        font-size: 0.75rem;
        color: #475569;
        line-height: 1.55;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
        min-height: 36px;
    }
    
    .article-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        padding-top: 12px;
        border-top: 1px solid #f1f5f9;
    }
    
    .read-more {
        color: #1abc9c;
        text-decoration: none;
        font-size: 0.7rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }
    
    .read-more:hover {
        gap: 10px;
        color: #0e7c64;
    }
    
    .read-more svg {
        width: 12px;
        height: 12px;
    }
    
    /* Empty State */
    .empty-state-artikel {
        grid-column: 1 / -1;
        text-align: center;
        padding: 50px;
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
    @media (max-width: 1100px) {
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
            margin-bottom: 20px;
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
            height: 200px;
        }
        
        .article-title {
            font-size: 0.9rem;
        }
        
        .article-excerpt {
            font-size: 0.8rem;
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
                <h5>
                    <i class="fas fa-folder-open"></i> Kategori
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
            
            @if($kategori_aktif || request('cari'))
            <div class="btn-reset-wrapper">
                <a href="/artikel" class="btn-reset-kategori">
                    <i class="fas fa-times"></i> Reset Filter
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
                <h3>
                    @if($kategori_aktif)
                        <i class="fas fa-tag"></i> Kategori: {{ $kategori_aktif }}
                    @elseif(request('cari'))
                        <i class="fas fa-search"></i> Hasil: "{{ request('cari') }}"
                    @else
                        <i class="fas fa-newspaper"></i> Artikel Terbaru
                    @endif
                </h3>
                <div class="article-count">
                    📊 {{ $list_artikel->count() }} artikel
                </div>
            </div>
            
            <!-- GRID ARTIKEL - 3 KOLOM -->
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
                        <div class="category-tag">{{ $item->kategori_artikel ?? 'Kesehatan' }}</div>
                        
                        @if($item->created_at && $item->created_at->diffInDays(now()) <= 7)
                            <div class="badge-new">✨ BARU</div>
                        @endif
                    </div>

                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-date">
                                <i class="far fa-calendar-alt"></i> {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru saja' }}
                            </span>
                            <span class="article-author">
                                <i class="fas fa-user-edit"></i> {{ $item->penulis ?? 'Admin' }}
                            </span>
                        </div>
                        
                        <div class="article-title">{{ $item->judul }}</div>
                        
                        <div class="article-excerpt">
                            {{ Str::limit(strip_tags($item->konten), 100) }}
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

<!-- ============ SCRIPT UNTUK NAVBAR SCROLL (DITAMBAHKAN) ============ -->
<script>
(function() {
    function updateNavbar() {
        var nav = document.getElementById('mainNavbar');
        if (!nav) return;
        
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', updateNavbar);
    updateNavbar();
})();
</script>

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