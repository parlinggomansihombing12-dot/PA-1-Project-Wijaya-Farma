@extends('layouts.admin_master')
@section('title', 'Dashboard - Admin Panel')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #d1fae5;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
        --shadow-lg: 0 8px 25px rgba(0,0,0,0.08);
    }

    .content {
        padding: 20px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
    }

    /* ================= WELCOME CARD PREMIUM ================= */
    .welcome-card {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        border-radius: 24px;
        padding: 30px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .welcome-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(26,188,156,0.15), transparent);
        border-radius: 50%;
    }

    .welcome-card::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(230,126,34,0.1), transparent);
        border-radius: 50%;
    }

    .welcome-content {
        position: relative;
        z-index: 2;
    }

    .welcome-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .welcome-title i {
        color: var(--primary);
        font-size: 1.5rem;
    }

    .welcome-text {
        color: rgba(255,255,255,0.7);
        font-size: 0.85rem;
        margin-bottom: 0;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        background: var(--primary-light);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-icon i {
        font-size: 1.5rem;
        color: var(--primary);
    }

    .stat-info h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        line-height: 1.2;
    }

    .stat-info p {
        font-size: 0.7rem;
        color: var(--text-muted);
        margin: 0;
    }

    /* Section Header */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 1rem;
        font-weight: 800;
        color: var(--dark);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title i {
        color: var(--primary);
    }

    /* Shortcut Grid */
    .shortcut-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 40px;
    }

    .shortcut-card {
        background: white;
        border-radius: 18px;
        padding: 20px;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
        transition: all 0.3s;
        text-decoration: none;
        display: block;
    }

    .shortcut-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary);
    }

    .shortcut-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-light);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .shortcut-icon i {
        font-size: 1.3rem;
        color: var(--primary);
    }

    .shortcut-title {
        font-size: 0.9rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 6px;
    }

    .shortcut-desc {
        font-size: 0.7rem;
        color: var(--text-muted);
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .shortcut-link {
        font-size: 0.65rem;
        color: var(--primary);
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: gap 0.2s;
    }

    .shortcut-card:hover .shortcut-link {
        gap: 10px;
    }

    /* Recent Activity */
    .recent-section {
        background: white;
        border-radius: 20px;
        border: 1px solid #eef2f6;
        overflow: hidden;
    }

    .recent-header {
        padding: 18px 20px;
        background: #f8fafc;
        border-bottom: 1px solid #eef2f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .recent-header h4 {
        font-size: 0.9rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .recent-table {
        width: 100%;
    }

    .recent-table thead th {
        padding: 12px 20px;
        font-size: 0.65rem;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        border-bottom: 1px solid #eef2f6;
    }

    .recent-table tbody td {
        padding: 12px 20px;
        font-size: 0.75rem;
        color: var(--text-muted);
        border-bottom: 1px solid #eef2f6;
    }

    .recent-table tbody tr:hover {
        background: #f8fafc;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 10px;
        border-radius: 30px;
        font-size: 0.6rem;
        font-weight: 700;
    }

    .badge-success {
        background: #d1fae5;
        color: #065f46;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        .shortcut-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 900px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .shortcut-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .shortcut-grid {
            grid-template-columns: 1fr;
        }
        .content {
            padding: 15px;
        }
        .welcome-card {
            padding: 20px;
        }
        .welcome-title {
            font-size: 1.1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- WELCOME CARD PREMIUM -->
    <div class="welcome-card">
        <div class="welcome-content">
            <div class="welcome-title">
                <i class="fas fa-crown"></i> 
                Selamat Datang, {{ Auth::user()->name }}!
            </div>
            <div class="welcome-text">
                Ini adalah Pusat Kendali Apotek Wijaya Farma. Silakan pilih menu di bawah untuk mulai mengelola data.
            </div>
        </div>
    </div>

    <!-- STATISTIK DASHBOARD -->
    @php
        $total_produk = \App\Models\Produk::count();
        $total_kategori = \App\Models\Kategori::count();
        $total_layanan = \App\Models\Layanan::count();
        $total_artikel = \App\Models\Artikel::count();
        $total_testimoni = \App\Models\Testimoni::count();
    @endphp

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-box-open"></i></div>
            <div class="stat-info">
                <h3>{{ $total_produk }}</h3>
                <p>Total Produk</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-tags"></i></div>
            <div class="stat-info">
                <h3>{{ $total_kategori }}</h3>
                <p>Total Kategori</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-notes-medical"></i></div>
            <div class="stat-info">
                <h3>{{ $total_layanan }}</h3>
                <p>Total Layanan</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
            <div class="stat-info">
                <h3>{{ $total_artikel }}</h3>
                <p>Total Artikel</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-star"></i></div>
            <div class="stat-info">
                <h3>{{ $total_testimoni }}</h3>
                <p>Total Testimoni</p>
            </div>
        </div>
    </div>

    <!-- SHORTCUT MENU -->
    <div class="section-header">
        <div class="section-title">
            <i class="fas fa-bolt"></i> Pintas Kelola Data (Shortcut)
        </div>
    </div>

    <div class="shortcut-grid">
        <a href="{{ url('/admin/produk') }}" class="shortcut-card">
            <div class="shortcut-icon"><i class="fas fa-box-open"></i></div>
            <div class="shortcut-title">Produk Obat</div>
            <div class="shortcut-desc">Tambah obat baru, update harga, & atur stok.</div>
            <div class="shortcut-link">Kelola <i class="fas fa-arrow-right"></i></div>
        </a>
        <a href="{{ url('/admin/kategori') }}" class="shortcut-card">
            <div class="shortcut-icon"><i class="fas fa-tags"></i></div>
            <div class="shortcut-title">Kategori</div>
            <div class="shortcut-desc">Kelompokkan obat agar mudah dicari pelanggan.</div>
            <div class="shortcut-link">Kelola <i class="fas fa-arrow-right"></i></div>
        </a>
        <a href="{{ url('/admin/layanan') }}" class="shortcut-card">
            <div class="shortcut-icon"><i class="fas fa-notes-medical"></i></div>
            <div class="shortcut-title">Layanan</div>
            <div class="shortcut-desc">Atur layanan kesehatan (Cek Gula Darah, dll).</div>
            <div class="shortcut-link">Kelola <i class="fas fa-arrow-right"></i></div>
        </a>
        <a href="{{ url('/admin/artikel') }}" class="shortcut-card">
            <div class="shortcut-icon"><i class="fas fa-newspaper"></i></div>
            <div class="shortcut-title">Artikel Edukasi</div>
            <div class="shortcut-desc">Tulis berita dan edukasi kesehatan publik.</div>
            <div class="shortcut-link">Kelola <i class="fas fa-arrow-right"></i></div>
        </a>
        <a href="{{ url('/admin/testimoni') }}" class="shortcut-card">
            <div class="shortcut-icon"><i class="fas fa-star"></i></div>
            <div class="shortcut-title">Testimoni</div>
            <div class="shortcut-desc">Setujui ulasan dan rating dari pelanggan.</div>
            <div class="shortcut-link">Kelola <i class="fas fa-arrow-right"></i></div>
        </a>
        <a href="{{ url('/admin/profil-toko') }}" class="shortcut-card">
            <div class="shortcut-icon"><i class="fas fa-store-alt"></i></div>
            <div class="shortcut-title">Profil Apotek</div>
            <div class="shortcut-desc">Ubah nama, alamat, kontak, & visi misi toko.</div>
            <div class="shortcut-link">Kelola <i class="fas fa-arrow-right"></i></div>
        </a>
        <a href="{{ url('/admin/kontak') }}" class="shortcut-card">
            <div class="shortcut-icon"><i class="fas fa-address-book"></i></div>
            <div class="shortcut-title">Kelola Kontak</div>
            <div class="shortcut-desc">Baca dan balas pesan dari form kontak web.</div>
            <div class="shortcut-link">Kelola <i class="fas fa-arrow-right"></i></div>
        </a>
        <div class="shortcut-card" style="opacity: 0.7; background: #f8fafc;">
            <div class="shortcut-icon" style="background: #e2e8f0;"><i class="fas fa-chart-line" style="color: #94a3b8;"></i></div>
            <div class="shortcut-title">Laporan (Segera)</div>
            <div class="shortcut-desc">Statistik penjualan dan laporan keuangan.</div>
            <div class="shortcut-link" style="color: #94a3b8;">Coming Soon <i class="fas fa-clock"></i></div>
        </div>
    </div>

    <!-- AKTIVITAS TERBARU -->
    <div class="recent-section">
        <div class="recent-header">
            <h4><i class="fas fa-history"></i> Aktivitas Terbaru</h4>
            <span class="badge-status badge-success"><i class="fas fa-sync-alt"></i> Live</span>
        </div>
        <div class="table-responsive">
            <table class="recent-table">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Aktivitas</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="far fa-clock me-1"></i> {{ now()->format('H:i') }}</td>
                        <td>Login ke sistem</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td><i class="far fa-clock me-1"></i> {{ now()->subMinutes(5)->format('H:i') }}</td>
                        <td>Mengakses halaman dashboard</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td><i class="far fa-clock me-1"></i> {{ now()->subHours(2)->format('H:i') }}</td>
                        <td>Membuka menu kelola produk</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection