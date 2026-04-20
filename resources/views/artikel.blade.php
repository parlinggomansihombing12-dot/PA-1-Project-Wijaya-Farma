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
            repeating-linear-gradient(45deg, 
                rgba(0,0,0,0.008) 0px, 
                rgba(0,0,0,0.008) 1px,
                transparent 1px,
                transparent 20px
            );
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
    
    /* Container utama */
    .articles-container {
        position: relative;
        z-index: 2;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    }
    
    /* Sidebar Kategori Artikel */
    .kategori-sidebar {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #eef2f6;
        position: sticky;
        top: 90px;
    }
    
    .kategori-sidebar h5 {
        font-size: 14px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #1abc9c;
        display: inline-block;
    }
    
    .kategori-artikel-link {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        margin: 5px 0;
        color: #475569;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        border-radius: 12px;
        transition: all 0.3s ease;
        gap: 10px;
    }
    
    .kategori-artikel-link:hover {
        background: #f0fdf4;
        color: #1abc9c;
        transform: translateX(5px);
    }
    
    .kategori-artikel-link.active {
        background: #f0fdf4;
        color: #1abc9c;
        font-weight: 600;
    }
    
    /* Artikel Terpopuler */
    .popular-section {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        margin-bottom: 40px;
        border: 1px solid #eef2f6;
        transition: 0.3s;
    }
    
    .popular-header {
        background: linear-gradient(135deg, #1abc9c, #16a085);
        padding: 18px 25px;
    }
    
    .popular-header h4 {
        color: white;
        font-size: 1.2rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .popular-item {
        padding: 25px;
        border-bottom: 1px solid #f0f2f5;
        transition: 0.3s;
        cursor: pointer;
    }
    
    .popular-item:last-child {
        border-bottom: none;
    }
    
    .popular-item:hover {
        background: #fafcfd;
        transform: translateX(5px);
    }
    
    .popular-badge {
        background: #fee2e2;
        color: #ef4444;
        font-size: 10px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 12px;
    }
    
    .popular-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 12px;
        line-height: 1.4;
    }
    
    .popular-meta {
        font-size: 12px;
        color: #94a3b8;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    /* Grid Artikel Terbaru */
    .section-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    
    .section-title h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        position: relative;
        display: inline-block;
    }
    
    .section-title h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #1abc9c, #f39c12);
        border-radius: 3px;
    }
    
    /* Card Artikel */
    .article-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #eef2f6;
    }
    
    .article-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.08);
        border-color: #1abc9c30;
    }
    
    .article-image {
        height: 200px;
        overflow: hidden;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
        position: relative;
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
    
    .category-tag {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(5px);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        color: #1abc9c;
        letter-spacing: 0.5px;
    }
    
    .article-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .article-date {
        font-size: 11px;
        color: #94a3b8;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .article-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 12px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 48px;
    }
    
    .article-excerpt {
        font-size: 13px;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 15px;
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
        padding-top: 15px;
        border-top: 1px solid #f0f2f5;
    }
    
    .read-more {
        color: #1abc9c;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: 0.3s;
    }
    
    .read-more:hover {
        gap: 10px;
        color: #16a085;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .articles-container {
            padding: 0 20px;
        }
        .articles-title {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 768px) {
        .articles-header {
            padding: 40px 0 30px;
        }
        .articles-title {
            font-size: 1.6rem;
        }
        .popular-item {
            padding: 18px;
        }
        .popular-title {
            font-size: 1rem;
        }
    }
    
    /* Animasi fade in */
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
    
    .article-card, .popular-item {
        animation: fadeInUp 0.5s ease forwards;
    }
</style>
@endsection

@section('content')
<!-- Background blobs -->
<div class="bg-blob-2"></div>

<!-- Header -->
<div class="articles-header">
    <div class="articles-container">
        <h1 class="articles-title">📚 Artikel Kesehatan</h1>
        <p class="articles-subtitle">Informasi terbaru seputar kesehatan, obat-obatan, dan gaya hidup sehat</p>
    </div>
</div>

<div class="articles-container">
    <div class="row g-4">
        
        <!-- Sidebar Kiri -->
        <div class="col-lg-3">
            <div class="kategori-sidebar">
                <h5>📂 Kategori Artikel</h5>
                <a href="/artikel" class="kategori-artikel-link {{ empty($kategori_aktif) ? 'active' : '' }}">
                    <span>📰</span> Semua Artikel
                </a>
                <a href="/artikel?kategori=edukasi" class="kategori-artikel-link">
                    <span>📖</span> Edukasi
                </a>
                <a href="/artikel?kategori=kesehatan" class="kategori-artikel-link">
                    <span>💊</span> Kesehatan
                </a>
                <a href="/artikel?kategori=gaya-hidup" class="kategori-artikel-link">
                    <span>🌿</span> Gaya Hidup Sehat
                </a>
                <a href="/artikel?kategori=obat" class="kategori-artikel-link">
                    <span>💊</span> Informasi Obat
                </a>
            </div>
        </div>
        
        <!-- Konten Utama -->
        <div class="col-lg-9">
            
            <!-- Artikel Terpopuler -->
            <div class="popular-section">
                <div class="popular-header">
                    <h4>
                        🔥 Artikel Terpopuler
                    </h4>
                </div>
                
                @foreach($artikel_populer ?? [] as $index => $item)
                <div class="popular-item" onclick="window.location='/artikel/{{ $item->id }}'">
                    <div class="popular-badge">Peringkat #{{ $index + 1 }}</div>
                    <div class="popular-title">{{ $item->judul ?? 'Peran Pengelolaan Sampah dalam Pengendalian DBD' }}</div>
                    <div class="popular-meta">
                        <span>📅 {{ $item->tanggal ?? '13 April 2026' }}</span>
                        <span>👁️ {{ $item->views ?? 1245 }} dilihat</span>
                    </div>
                </div>
                @endforeach
                
                @if(empty($artikel_populer))
                <div class="popular-item">
                    <div class="popular-badge">Peringkat #1</div>
                    <div class="popular-title">Peran Pengelolaan Sampah dalam Pengendalian DBD</div>
                    <div class="popular-meta">
                        <span>📅 13 April 2026</span>
                        <span>👁️ 1.245 dilihat</span>
                    </div>
                </div>
                <div class="popular-item">
                    <div class="popular-badge">Peringkat #2</div>
                    <div class="popular-title">Diabetes dan Hipertensi pada Pasien Gigi</div>
                    <div class="popular-meta">
                        <span>📅 13 April 2026</span>
                        <span>👁️ 987 dilihat</span>
                    </div>
                </div>
                <div class="popular-item">
                    <div class="popular-badge">Peringkat #3</div>
                    <div class="popular-title">Manfaat Teknologi AI dalam Kehidupan Sehari-hari</div>
                    <div class="popular-meta">
                        <span>📅 12 April 2026</span>
                        <span>👁️ 876 dilihat</span>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Artikel Terbaru -->
            <div class="section-title">
                <h3>📖 Artikel Terbaru</h3>
            </div>
            
            <div class="row g-4">
                @forelse($list_artikel ?? [] as $index => $item)
                <div class="col-md-6 col-lg-6" style="animation-delay: {{ $index * 0.05 }}s">
                    <div class="article-card">
                        <div class="article-image">
                            @if($item->foto)
                                <img src="{{ asset('images/artikel/' . $item->foto) }}" alt="{{ $item->judul }}">
                            @else
                                <img src="https://placehold.co/400x200/e2e8f0/64748b?text=Artikel+Kesehatan" alt="placeholder">
                            @endif
                            <div class="category-tag">{{ $item->kategori ?? 'Edukasi' }}</div>
                        </div>
                        <div class="article-content">
                            <div class="article-date">
                                <span>📅</span> {{ $item->created_at ? $item->created_at->format('d M Y') : '13 April 2026' }}
                            </div>
                            <div class="article-title">{{ $item->judul ?? 'Germas - Gerakan Masyarakat Hidup Sehat' }}</div>
                            <div class="article-excerpt">
                                {{ Str::limit($item->deskripsi ?? 'GERMAS - Mengatasi masalah kesehatan masih menjadi sebuah tantangan serius di Indonesia. Kini setidaknya...', 100) }}
                            </div>
                            <div class="article-footer">
                                <a href="/artikel/{{ $item->id ?? '#' }}" class="read-more">
                                    Baca Selengkapnya <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Sample artikel untuk preview -->
                <div class="col-md-6 col-lg-6">
                    <div class="article-card">
                        <div class="article-image">
                            <img src="https://placehold.co/400x200/e2e8f0/64748b?text=Germas" alt="Germas">
                            <div class="category-tag">Edukasi</div>
                        </div>
                        <div class="article-content">
                            <div class="article-date">
                                <span>📅</span> 13 April 2026
                            </div>
                            <div class="article-title">Germas - Gerakan Masyarakat Hidup Sehat</div>
                            <div class="article-excerpt">
                                GERMAS - Mengatasi masalah kesehatan masih menjadi sebuah tantangan serius di Indonesia. Kini setidaknya...
                            </div>
                            <div class="article-footer">
                                <a href="/artikel/1" class="read-more">
                                    Baca Selengkapnya <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="article-card">
                        <div class="article-image">
                            <img src="https://placehold.co/400x200/e2e8f0/64748b?text=Diabetes" alt="Diabetes">
                            <div class="category-tag">Edukasi</div>
                        </div>
                        <div class="article-content">
                            <div class="article-date">
                                <span>📅</span> 13 April 2026
                            </div>
                            <div class="article-title">Diabetes dan Hipertensi pada Pasien Gigi</div>
                            <div class="article-excerpt">
                                Peningkatan insiden penyakit kronis seperti diabetes melitus tipe 2 (T2DM) dan hipertensi (HTN) men...
                            </div>
                            <div class="article-footer">
                                <a href="/artikel/2" class="read-more">
                                    Baca Selengkapnya <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="article-card">
                        <div class="article-image">
                            <img src="https://placehold.co/400x200/e2e8f0/64748b?text=AI" alt="AI">
                            <div class="category-tag">Teknologi</div>
                        </div>
                        <div class="article-content">
                            <div class="article-date">
                                <span>📅</span> 12 April 2026
                            </div>
                            <div class="article-title">Manfaat Teknologi AI dalam Kehidupan Sehari-hari</div>
                            <div class="article-excerpt">
                                Kecerdasan buatan atau AI kini semakin terintegrasi dalam berbagai aspek kehidupan manusia...
                            </div>
                            <div class="article-footer">
                                <a href="/artikel/3" class="read-more">
                                    Baca Selengkapnya <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="article-card">
                        <div class="article-image">
                            <img src="https://placehold.co/400x200/e2e8f0/64748b?text=Kesehatan+Mental" alt="Kesehatan Mental">
                            <div class="category-tag">Edukasi</div>
                        </div>
                        <div class="article-content">
                            <div class="article-date">
                                <span>📅</span> 11 April 2026
                            </div>
                            <div class="article-title">Pentingnya Kesehatan Mental di Dunia Kerja</div>
                            <div class="article-excerpt">
                                Belakangan ini, isu kesehatan mental sering diperbincangkan oleh banyak kalangan, salah satunya di...
                            </div>
                            <div class="article-footer">
                                <a href="/artikel/4" class="read-more">
                                    Baca Selengkapnya <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if(isset($list_artikel) && method_exists($list_artikel, 'links'))
            <div class="d-flex justify-content-center mt-5">
                {{ $list_artikel->links() }}
            </div>
            @endif
        </div>
        
    </div>
</div>
@endsection