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
        content: ''; 
        position: fixed; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%;
        background-image: 
            radial-gradient(circle at 10% 90%, rgba(26, 188, 156, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 90% 10%, rgba(52, 152, 219, 0.03) 0%, transparent 50%),
            repeating-linear-gradient(45deg, rgba(0,0,0,0.008) 0px, rgba(0,0,0,0.008) 1px, transparent 1px, transparent 20px);
        pointer-events: none; 
        z-index: 0;
    }
    
    /* Floating blobs subtle */
    body::after {
        content: ''; 
        position: fixed; 
        top: -20%; 
        left: -10%; 
        width: 60%; 
        height: 60%;
        background: radial-gradient(ellipse, rgba(26, 188, 156, 0.04) 0%, transparent 70%);
        border-radius: 50%; 
        pointer-events: none; 
        z-index: 0; 
        animation: floatBlob 35s ease-in-out infinite;
    }
    
    .bg-blob-2 {
        position: fixed; 
        bottom: -15%; 
        right: -5%; 
        width: 50%; 
        height: 50%;
        background: radial-gradient(ellipse, rgba(241, 196, 15, 0.03) 0%, transparent 70%);
        border-radius: 50%; 
        pointer-events: none; 
        z-index: 0; 
        animation: floatBlob2 40s ease-in-out infinite;
    }
    
    @keyframes floatBlob { 
        0%, 100% { transform: translate(0, 0) scale(1); } 
        50% { transform: translate(3%, 5%) scale(1.08); } 
    }
    @keyframes floatBlob2 { 
        0%, 100% { transform: translate(0, 0) scale(1); } 
        50% { transform: translate(-4%, -6%) scale(1.12); } 
    }
    
    /* Header Artikel */
    .articles-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        padding: 60px 0 50px; 
        margin-bottom: 50px; 
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
        font-size: 2.5rem; 
        font-weight: 800; 
        color: white; 
        margin-bottom: 10px; 
        text-shadow: 0 2px 10px rgba(0,0,0,0.1); 
    }
    .articles-subtitle { 
        color: rgba(255,255,255,0.9); 
        font-size: 1.1rem; 
    }
    
    /* ============ CONTAINER FULL WIDTH ============ */
    .articles-container-full {
        width: 100%;
        max-width: 100%;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }
    
    /* ============ FLEX LAYOUT UNTUK SIDEBAR DAN KONTEN ============ */
    .articles-layout {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }
    
    /* SIDEBAR KATEGORI - DESAIN BARU LEBIH BAGUS */
    .kategori-sidebar {
        flex: 0 0 280px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
        border-radius: 28px;
        padding: 24px 20px;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255,255,255,0.6);
        position: sticky;
        top: 100px;
        align-self: flex-start;
        transition: all 0.3s ease;
    }
    
    .kategori-sidebar h5 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #1abc9c;
        display: inline-block;
        width: 100%;
    }
    
    .kategori-sidebar h5:before {
        content: '📂 ';
        font-size: 1rem;
    }
    
    /* Tombol Kategori - Desain Grid Modern */
    .kategori-grid {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .kategori-artikel-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: rgba(248, 250, 252, 0.8);
        border-radius: 60px;
        font-weight: 550;
        font-size: 0.85rem;
        color: #1e293b;
        text-decoration: none;
        transition: all 0.25s ease;
        border: 1px solid rgba(203, 213, 225, 0.4);
    }
    
    .kategori-artikel-link span:first-child {
        font-size: 1.1rem;
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
        padding: 2px 10px;
        border-radius: 40px;
        transition: all 0.2s;
    }
    
    .kategori-artikel-link:hover {
        background: white;
        border-color: #1abc9c;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(26, 188, 156, 0.15);
    }
    
    .kategori-artikel-link.active {
        background: linear-gradient(105deg, #1abc9c15 0%, #1abc9c25 100%);
        border-color: #1abc9c;
        border-left: 4px solid #1abc9c;
        font-weight: 700;
        color: #0f3b2c;
    }
    
    /* ============ KONTEN UTAMA - GRID FULL TANPA RUANG KOSONG ============ */
    .konten-utama {
        flex: 1;
        min-width: 0;
    }
    
    /* SEARCH BOX */
    .search-box-wrapper {
        margin-bottom: 30px;
    }
    
    .search-box-artikel {
        width: 100%;
        border-radius: 60px;
        padding: 14px 50px 14px 24px;
        border: 1px solid #e2e8f0;
        background: white;
        font-size: 0.9rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        transition: all 0.3s;
    }
    
    .search-box-artikel:focus {
        border-color: #1abc9c;
        outline: none;
        box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.1);
    }
    
    .btn-search {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #1abc9c;
        font-size: 1.1rem;
        cursor: pointer;
    }
    
    /* SECTION TITLE */
    .section-title {
        margin-bottom: 28px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e2e8f0;
    }
    
    .section-title h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }
    
    .section-title h3:before {
        content: '📖 ';
        font-weight: normal;
    }
    
    /* ============ GRID ARTIKEL - TIDAK ADA RUANG KOSONG ============ */
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    
    /* CARD ARTIKEL */
    .article-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.35s ease;
        box-shadow: 0 8px 20px -12px rgba(0, 0, 0, 0.12);
        border: 1px solid rgba(226, 232, 240, 0.8);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .article-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 35px -16px rgba(0, 0, 0, 0.2);
        border-color: #1abc9c60;
    }
    
    .article-image {
        overflow: hidden;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
        position: relative;
        height: 200px;
        flex-shrink: 0;
    }
    
    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .article-card:hover .article-image img {
        transform: scale(1.05);
    }
    
    .category-tag {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(6px);
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 800;
        color: #1abc9c;
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
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .article-title {
        font-size: 1.05rem;
        font-weight: 750;
        color: #0f172a;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 48px;
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
        flex: 1;
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
    
    /* Empty State */
    .empty-state-artikel {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: rgba(255,255,255,0.9);
        border-radius: 48px;
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
    @media (max-width: 1100px) {
        .articles-grid {
            grid-template-columns: repeat(2, 1fr);
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
        
        .kategori-grid {
            flex-direction: row;
            flex-wrap: wrap;
        }
        
        .kategori-artikel-link {
            flex: 0 0 auto;
        }
        
        .articles-grid {
            grid-template-columns: 1fr;
        }
        
        .articles-title {
            font-size: 1.8rem;
        }
    }
    
    @media (min-width: 769px) and (max-width: 900px) {
        .articles-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    /* Tombol reset */
    .btn-reset-kategori {
        margin-top: 16px;
        padding-top: 12px;
        border-top: 1px solid #e2e8f0;
    }
    
    .btn-reset-kategori a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #f1f5f9;
        padding: 8px 16px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 0.8rem;
        color: #64748b;
        transition: 0.2s;
    }
    
    .btn-reset-kategori a:hover {
        background: #e2e8f0;
        color: #1e293b;
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
        
        <!-- SIDEBAR KATEGORI -->
        <aside class="kategori-sidebar">
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
            
            <!-- Tombol reset jika ada filter aktif -->
            @if($kategori_aktif || request('cari'))
            <div class="btn-reset-kategori">
                <a href="/artikel">
                    🔄 Reset Filter
                </a>
            </div>
            @endif
        </aside>
        
        <!-- KONTEN UTAMA -->
        <main class="konten-utama">
            
            <!-- Search Box -->
            <div class="search-box-wrapper position-relative">
                <form action="/artikel" method="GET">
                    @if($kategori_aktif) 
                        <input type="hidden" name="kategori" value="{{ $kategori_aktif }}"> 
                    @endif
                    <input type="text" name="cari" class="search-box-artikel" 
                           placeholder="Cari judul atau topik artikel..." 
                           value="{{ request('cari') }}">
                    <button type="submit" class="btn-search">
                        🔍
                    </button>
                </form>
            </div>

            <!-- Section Title -->
            <div class="section-title">
                <h3>{{ $kategori_aktif ? 'Kategori: ' . $kategori_aktif : 'Artikel Terbaru' }}</h3>
            </div>
            
            <!-- GRID ARTIKEL - FULL WIDTH TANPA RUANG KOSONG -->
            <div class="articles-grid">
                @forelse($list_artikel as $index => $item)
                <div class="article-card" style="animation-delay: {{ $index * 0.05 }}s">
                    
                    <!-- Gambar dengan tinggi konsisten -->
                    <div class="article-image">
                        @if($item->foto && file_exists(public_path('images/artikel/' . $item->foto)))
                            <img src="{{ asset('images/artikel/' . $item->foto) }}" alt="{{ $item->judul }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=600&auto=format&fit=crop" alt="Artikel Kesehatan">
                        @endif
                        <div class="category-tag">{{ $item->kategori_artikel ?? 'Kesehatan' }}</div>
                    </div>

                    <div class="article-content">
                        <div class="article-date">
                            <span>📅</span> 
                            {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru saja' }}
                            <span>•</span>
                            <span>✍️</span> 
                            {{ $item->penulis ?? 'Admin' }}
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
                @empty
                <div class="empty-state-artikel">
                    <div style="font-size: 64px; margin-bottom: 20px;">📭</div>
                    <h4 class="text-muted fw-bold mb-2">Belum Ada Artikel</h4>
                    <p class="text-muted">Maaf, artikel untuk kategori atau pencarian ini belum tersedia.</p>
                    <a href="/artikel" class="btn btn-cari mt-3" style="display: inline-block; width: auto; padding: 10px 30px;">
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
            particle.style.backgroundColor = 'rgba(26, 188, 156, 0.15)';
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
    /* Additional keyframe untuk particles */
    @keyframes floatBlob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(15px, 10px) scale(1.3); }
    }
</style>

@endsection