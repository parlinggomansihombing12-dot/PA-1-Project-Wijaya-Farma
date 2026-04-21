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
    
    /* Sidebar Kategori Artikel */
    .kategori-sidebar {
        background: white; border-radius: 20px; padding: 25px; margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #eef2f6; position: sticky; top: 100px;
    }
    
    .kategori-sidebar h5 {
        font-size: 14px; font-weight: 800; color: #1e293b; margin-bottom: 20px; padding-bottom: 10px;
        border-bottom: 2px solid #1abc9c; display: inline-block;
    }
    
    .kategori-artikel-link {
        display: flex; align-items: center; padding: 10px 15px; margin: 5px 0; color: #475569;
        text-decoration: none; font-weight: 500; font-size: 14px; border-radius: 12px; transition: all 0.3s ease; gap: 10px;
    }
    
    .kategori-artikel-link:hover { background: #f0fdf4; color: #1abc9c; transform: translateX(5px); }
    .kategori-artikel-link.active { background: #f0fdf4; color: #1abc9c; font-weight: 600; border-left: 3px solid #1abc9c; }
    
    /* Grid Artikel Terbaru */
    .section-title { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
    .section-title h3 { font-size: 1.5rem; font-weight: 700; color: #1e293b; position: relative; display: inline-block; }
    .section-title h3::after {
        content: ''; position: absolute; bottom: -8px; left: 0; width: 60px; height: 3px;
        background: linear-gradient(90deg, #1abc9c, #f39c12); border-radius: 3px;
    }
    
    /* Card Artikel */
    .article-card {
        background: white; border-radius: 20px; overflow: hidden; transition: all 0.3s ease;
        height: 100%; display: flex; flex-direction: column; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid #eef2f6;
    }
    .article-card:hover { transform: translateY(-8px); box-shadow: 0 20px 35px rgba(0,0,0,0.08); border-color: #1abc9c30; }
    
    .article-image { height: 200px; overflow: hidden; background: linear-gradient(145deg, #f1f5f9, #e2e8f0); position: relative; }
    .article-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
    .article-card:hover .article-image img { transform: scale(1.05); }
    
    .category-tag {
        position: absolute; top: 15px; left: 15px; background: rgba(255,255,255,0.95); backdrop-filter: blur(5px);
        padding: 5px 12px; border-radius: 20px; font-size: 10px; font-weight: 700; color: #1abc9c; letter-spacing: 0.5px;
    }
    
    .article-content { padding: 20px; flex: 1; display: flex; flex-direction: column; }
    .article-date { font-size: 11px; color: #94a3b8; margin-bottom: 10px; display: flex; align-items: center; gap: 6px; }
    .article-title {
        font-size: 1.1rem; font-weight: 700; color: #1e293b; margin-bottom: 12px; line-height: 1.4;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 48px;
    }
    .article-excerpt {
        font-size: 13px; color: #64748b; line-height: 1.5; margin-bottom: 15px;
        display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; flex: 1;
    }
    
    .article-footer { display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 15px; border-top: 1px solid #f0f2f5; }
    .read-more { color: #1abc9c; text-decoration: none; font-size: 12px; font-weight: 700; display: flex; align-items: center; gap: 5px; transition: 0.3s; }
    .read-more:hover { gap: 10px; color: #16a085; }

    /* Box Pencarian Elegan */
    .search-box-artikel { border-radius: 30px; padding: 12px 25px; border: 1px solid #e0e0e0; background-color: #ffffff; width: 100%; transition: 0.3s; box-shadow: 0 5px 15px rgba(0,0,0,0.03); }
    .search-box-artikel:focus { border-color: #1ABC9C; outline: none; box-shadow: 0 0 15px rgba(26, 188, 156, 0.15); }
    
    @media (max-width: 992px) { .articles-container { padding: 0 20px; } }
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
        
        <!-- ================= SIDEBAR KIRI (DINAMIS DARI DATABASE) ================= -->
        <div class="col-lg-3">
            <div class="kategori-sidebar">
                <h5>📂 Kategori Artikel</h5>
                
                <!-- Link "Semua Artikel" (Menyala jika tidak ada kategori yang dipilih) -->
                <a href="/artikel" class="kategori-artikel-link {{ empty($kategori_aktif) ? 'active' : '' }}">
                    <span>📰</span> Semua Artikel
                </a>
                
                <!-- Looping Kategori dari Database (Hanya memunculkan kategori yang punya artikel) -->
                @foreach($kategori_unik ?? [] as $kat)
                    @if($kat->kategori_artikel != '')
                        <!-- Mengecek apakah URL mengandung parameter kategori ini -->
                        <a href="/artikel?kategori={{ urlencode($kat->kategori_artikel) }}" class="kategori-artikel-link {{ $kategori_aktif == $kat->kategori_artikel ? 'active' : '' }}">
                            <span>🏷️</span> {{ $kat->kategori_artikel }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        
        <!-- ================= KONTEN UTAMA KANAN ================= -->
        <div class="col-lg-9">
            
            <!-- Kotak Pencarian -->
            <form action="/artikel" method="GET" class="position-relative mb-5">
                @if($kategori_aktif) <input type="hidden" name="kategori" value="{{ $kategori_aktif }}"> @endif
                <input type="text" name="cari" class="search-box-artikel" placeholder="Cari judul atau topik artikel..." value="{{ request('cari') }}">
                <button type="submit" class="btn position-absolute" style="right: 10px; top: 8px; color: #1ABC9C;"><i class="fas fa-search"></i></button>
            </form>

            <div class="section-title">
                <h3>📖 {{ $kategori_aktif ? 'Kategori: ' . $kategori_aktif : 'Artikel Terbaru' }}</h3>
            </div>
            
            <!-- GRID ARTIKEL (DINAMIS DARI DATABASE) -->
            <div class="row g-4">
                @forelse($list_artikel as $index => $item)
                <div class="col-md-6 col-lg-6" style="animation: fadeInUp 0.5s ease forwards; animation-delay: {{ $index * 0.05 }}s">
                    <div class="article-card">
                        
                        <!-- Logika Menampilkan Foto/Thumbnail -->
                        <div class="article-image">
                            @if($item->foto)
                                <img src="{{ asset('images/artikel/' . $item->foto) }}" alt="{{ $item->judul }}">
                            @else
                                <!-- Gambar default jika Admin lupa upload foto -->
                                <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=600&auto=format&fit=crop" alt="Artikel Kesehatan">
                            @endif
                            <div class="category-tag">{{ $item->kategori_artikel ?? 'Kesehatan Umum' }}</div>
                        </div>

                        <!-- Isi Teks Artikel -->
                        <div class="article-content">
                            <div class="article-date">
                                <span>📅</span> {{ $item->created_at ? $item->created_at->format('d M Y') : 'Baru saja' }} &nbsp;|&nbsp; ✍️ {{ $item->penulis ?? 'Admin' }}
                            </div>
                            
                            <div class="article-title">{{ $item->judul }}</div>
                            
                            <div class="article-excerpt">
                                <!-- Mengambil ringkasan, atau memotong konten asli tanpa tag HTML -->
                                {{ Str::limit(strip_tags($item->konten), 120) }}
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
                
                <!-- JIKA ARTIKEL KOSONG DI DATABASE / PENCARIAN -->
                <div class="col-12">
                    <div class="text-center py-5 bg-white rounded-4 shadow-sm border border-light" style="min-height: 300px; display: flex; flex-direction: column; justify-content: center;">
                        <h1 class="display-1 opacity-25 mb-3">📭</h1>
                        <h4 class="text-muted fw-bold">Belum Ada Artikel</h4>
                        <p class="text-muted">Maaf, artikel untuk kategori atau pencarian ini belum tersedia.</p>
                        <a href="/artikel" class="btn btn-outline-success rounded-pill px-4 mt-3 mx-auto" style="width: max-content;">Lihat Semua Artikel</a>
                    </div>
                </div>

                @endforelse
            </div>
            
        </div>
        
    </div>
</div>
@endsection