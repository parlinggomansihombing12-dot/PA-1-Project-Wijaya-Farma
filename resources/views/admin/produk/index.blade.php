@extends('layouts.admin_master')
@section('title', 'Data Produk - Admin Wijaya Farma')

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
        --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
    }

    .content {
        padding: 15px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        min-height: 100vh;
    }

    /* ================= HEADER ================= */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .page-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .page-title i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    /* ================= SEARCH BAR ================= */
    .search-wrapper {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
    }

    .search-input {
        padding: 8px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 40px;
        font-size: 0.75rem;
        width: 250px;
        transition: all 0.2s;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    .btn-search {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.7rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
    }

    .btn-search:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(26,188,156,0.25);
        gap: 8px;
    }

    .btn-reset {
        background: #f1f5f9;
        color: var(--text-muted);
        border: 1px solid #e2e8f0;
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.7rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }

    .btn-reset:hover {
        background: #e2e8f0;
        color: var(--dark);
        transform: translateY(-1px);
    }

    /* ================= TOMBOL TAMBAH ================= */
    .btn-tambah {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.75rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(26,188,156,0.3);
        gap: 10px;
        color: white;
    }

    /* ================= ALERT ================= */
    .alert-custom {
        background: #d1fae5;
        border-left: 3px solid var(--primary);
        border-radius: 10px;
        padding: 10px 16px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .alert-custom span {
        color: #065f46;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .alert-custom i {
        cursor: pointer;
        color: #065f46;
        font-size: 0.8rem;
    }

    /* ================= CARD TABEL ================= */
    .card-table {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef2f6;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table-custom {
        width: 100%;
        margin-bottom: 0;
    }

    .table-custom thead th {
        background: #f8fafc;
        color: var(--dark);
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 12px;
        border-bottom: 1px solid #eef2f6;
    }

    .table-custom tbody td {
        padding: 12px 12px;
        vertical-align: middle;
        font-size: 0.75rem;
        color: var(--text-muted);
        border-bottom: 1px solid #eef2f6;
    }

    .table-custom tbody tr:hover {
        background: #f8fafc;
    }

    /* ================= FOTO PRODUK ================= */
    .produk-foto {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
    }

    .foto-placeholder {
        width: 45px;
        height: 45px;
        background: #f1f5f9;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        border: 1px solid #eef2f6;
    }

    /* ================= BADGE STOK ================= */
    .badge-stok {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
    }

    .badge-stok.stok-banyak {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-stok.stok-sedang {
        background: #fef3c7;
        color: #b45309;
    }

    .badge-stok.stok-habis {
        background: #fee2e2;
        color: #991b1b;
    }

    /* ================= TOMBOL AKSI ================= */
    .btn-edit {
        background: #fef3c7;
        color: #b45309;
        border: none;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
    }

    .btn-edit:hover {
        background: #f59e0b;
        color: white;
        transform: translateY(-2px);
        gap: 7px;
    }

    .btn-hapus {
        background: #fee2e2;
        color: #991b1b;
        border: none;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }

    .btn-hapus:hover {
        background: #ef4444;
        color: white;
        transform: translateY(-2px);
        gap: 7px;
    }

    /* ================= PAGINATION PREMIUM ================= */
    .pagination-container {
        padding: 15px 20px;
        background: white;
        border-top: 1px solid #eef2f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    /* Info Pagination di Kiri */
    .pagination-info {
        font-size: 0.7rem;
        color: var(--text-muted);
        background: #f8fafc;
        padding: 6px 15px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .pagination-info i {
        color: var(--primary);
        font-size: 0.7rem;
    }

    .pagination-info strong {
        color: var(--primary-dark);
        font-weight: 800;
    }

    /* Tombol Pagination di Tengah */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        flex: 1;
    }

    .pagination-custom {
        display: flex;
        gap: 6px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .pagination-custom li {
        display: inline;
    }

    .pagination-custom a, .pagination-custom span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 12px;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        color: var(--text-muted);
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .pagination-custom a:hover {
        background: var(--primary-light);
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-2px);
    }

    .pagination-custom .active span {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-color: transparent;
        color: white;
        box-shadow: 0 3px 8px rgba(26,188,156,0.3);
    }

    .pagination-custom .disabled span {
        background: #f1f5f9;
        color: #cbd5e1;
        cursor: not-allowed;
        transform: none;
    }

    /* ================= EMPTY STATE ================= */
    .empty-state {
        text-align: center;
        padding: 50px 20px;
    }

    .empty-state i {
        font-size: 3rem;
        color: #cbd5e1;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: var(--text-muted);
        font-size: 0.75rem;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content {
            padding: 10px;
        }
        .page-title {
            font-size: 1rem;
        }
        .search-input {
            width: 180px;
            font-size: 0.7rem;
        }
        .btn-search, .btn-reset, .btn-tambah {
            padding: 6px 14px;
            font-size: 0.65rem;
        }
        .table-custom thead th,
        .table-custom tbody td {
            padding: 8px 6px;
            font-size: 0.65rem;
        }
        .produk-foto {
            width: 35px;
            height: 35px;
        }
        .btn-edit, .btn-hapus {
            padding: 4px 8px;
            font-size: 0.55rem;
        }
        .pagination-container {
            flex-direction: column;
            justify-content: center;
        }
        .pagination-wrapper {
            width: 100%;
        }
        .pagination-custom a, .pagination-custom span {
            min-width: 32px;
            height: 32px;
            padding: 0 8px;
            font-size: 0.7rem;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <h2 class="page-title">
            <i class="fas fa-box-open"></i> Data Produk Obat
        </h2>
        
        <div class="search-wrapper">
            <form action="{{ route('admin.produk.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="search-input" 
                       placeholder="Cari nama obat..." value="{{ request('search') }}">
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i> Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.produk.index') }}" class="btn-reset">
                        <i class="fas fa-times"></i> Reset
                    </a>
                @endif
            </form>
            <a href="{{ route('admin.produk.create') }}" class="btn-tambah">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
    </div>

    <!-- PESAN SUKSES -->
    @if(session('success'))
        <div class="alert-custom">
            <span><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.style.display='none'"></i>
        </div>
    @endif

    <!-- TABEL DATA -->
    <div class="card-table">
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 60px;">No</th>
                        <th class="text-center" style="width: 70px;">Foto</th>
                        <th>Nama Obat</th>
                        <th style="width: 110px;">Harga</th>
                        <th class="text-center" style="width: 90px;">Stok</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $index => $item)
                    <tr>
                        {{-- PERBAIKAN: Nomor berlanjut, tidak reset dari 1 --}}
                        <td class="text-center text-muted">{{ $produks->firstItem() + $index }}</td>
                        <td class="text-center">
                            @if($item->foto)
                                <img src="{{ asset('images/produk/' . $item->foto) }}" class="produk-foto" alt="Foto Produk">
                            @else
                                <div class="foto-placeholder">
                                    <i class="fas fa-camera fa-sm"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark" style="font-size: 0.8rem;">{{ \Illuminate\Support\Str::limit($item->nama_obat, 35) }}</div>
                            <div class="text-muted" style="font-size: 0.6rem;">
                                <i class="fas fa-tag me-1"></i> {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                            </div>
                        </td>
                        <td class="fw-bold" style="color: #e67e22; font-size: 0.75rem;">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>
                        <td class="text-center">
                            @php
                                $stokClass = $item->stok > 10 ? 'stok-banyak' : ($item->stok > 0 ? 'stok-sedang' : 'stok-habis');
                                $stokIcon = $item->stok > 0 ? '📦' : '❌';
                            @endphp
                            <span class="badge-stok {{ $stokClass }}">
                                {{ $stokIcon }} {{ $item->stok }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="empty-state">
                            <i class="fas fa-box-open"></i>
                            <p>Belum ada data produk</p>
                            @if(request('search'))
                                <a href="{{ route('admin.produk.index') }}" class="btn-tambah" style="display: inline-flex;">
                                    <i class="fas fa-times"></i> Hapus Filter
                                </a>
                            @else
                                <a href="{{ route('admin.produk.create') }}" class="btn-tambah" style="display: inline-flex;">
                                    <i class="fas fa-plus"></i> Tambah Produk
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- PAGINATION PREMIUM -->
        @if(method_exists($produks, 'links') && $produks instanceof \Illuminate\Pagination\AbstractPaginator)
        <div class="pagination-container">
            <!-- Info Showing di KIRI -->
            <div class="pagination-info">
                <i class="fas fa-chart-line"></i>
                Showing 
                <strong>{{ $produks->firstItem() ?? 0 }}</strong> 
                to 
                <strong>{{ $produks->lastItem() ?? 0 }}</strong> 
                of 
                <strong>{{ $produks->total() }}</strong> 
                results
            </div>
            
            <!-- Tombol Pagination di TENGAH -->
            <div class="pagination-wrapper">
                {{ $produks->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif
    </div>

</div>
@endsection

<style>
    /* Sembunyikan teks "Showing" bawaan Laravel */
    .pagination-wrapper p.text-sm {
        display: none !important;
    }
    
    /* Custom style untuk pagination links */
    .pagination-wrapper nav div:first-child {
        display: none !important;
    }
    
    .pagination-wrapper nav {
        display: flex;
        justify-content: center;
    }
    
    .pagination-wrapper .pagination {
        margin: 0;
        gap: 6px;
        flex-wrap: wrap;
    }
    
    .pagination-wrapper .page-link {
        border-radius: 10px !important;
        border: 1px solid #e2e8f0 !important;
        color: #64748b !important;
        font-weight: 600 !important;
        font-size: 0.75rem !important;
        padding: 8px 14px !important;
        background: white !important;
        transition: all 0.2s !important;
    }
    
    .pagination-wrapper .page-link:hover {
        background: #d1fae5 !important;
        border-color: #1ABC9C !important;
        color: #1ABC9C !important;
        transform: translateY(-2px);
    }
    
    .pagination-wrapper .active .page-link {
        background: linear-gradient(135deg, #1ABC9C, #16a085) !important;
        border-color: transparent !important;
        color: white !important;
        box-shadow: 0 2px 8px rgba(26,188,156,0.3);
    }
    
    .pagination-wrapper .disabled .page-link {
        background: #f1f5f9 !important;
        color: #cbd5e1 !important;
        cursor: not-allowed;
    }
</style>