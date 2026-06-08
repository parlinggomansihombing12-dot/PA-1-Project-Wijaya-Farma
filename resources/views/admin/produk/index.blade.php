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
        --shadow-md: 0 4px 15px rgba(0,0,0,0.06);
    }

    .content {
        padding: 20px;
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
        margin-bottom: 25px;
    }

    .page-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        position: relative;
        padding-left: 12px;
    }

    .page-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 20px;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        border-radius: 4px;
    }

    /* ================= TOMBOL TAMBAH - DIPERCANTIK ================= */
    .btn-tambah {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.8rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(26,188,156,0.3);
        gap: 12px;
        color: white;
    }

    /* ================= ALERT ================= */
    .alert-custom {
        background: #d1fae5;
        border-left: 4px solid var(--primary);
        border-radius: 12px;
        padding: 12px 18px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .alert-custom span {
        color: #065f46;
        font-size: 0.85rem;
        font-weight: 500;
    }

    /* ================= CARD TABEL ================= */
    .card-table {
        background: white;
        border-radius: 20px;
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
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 14px 12px;
        border-bottom: 1px solid #eef2f6;
    }

    .table-custom tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        font-size: 0.8rem;
        color: var(--text-muted);
        border-bottom: 1px solid #eef2f6;
    }

    .table-custom tbody tr:hover {
        background: #f8fafc;
    }

    /* ================= FOTO PRODUK ================= */
    .produk-foto {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        object-fit: cover;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eef2f6;
    }

    .foto-placeholder {
        width: 50px;
        height: 50px;
        background: #f1f5f9;
        border-radius: 12px;
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
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.7rem;
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

    /* ================= TOMBOL AKSI - DIPERCANTIK ================= */
    .btn-edit {
        background: #fef3c7;
        color: #b45309;
        border: none;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
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
        gap: 8px;
    }

    .btn-hapus {
        background: #fee2e2;
        color: #991b1b;
        border: none;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.7rem;
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
        gap: 8px;
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
        font-size: 0.85rem;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content {
            padding: 15px;
        }
        .page-title {
            font-size: 1.1rem;
        }
        .btn-tambah {
            padding: 8px 18px;
            font-size: 0.7rem;
        }
        .table-custom thead th,
        .table-custom tbody td {
            padding: 10px 8px;
            font-size: 0.7rem;
        }
        .produk-foto {
            width: 40px;
            height: 40px;
        }
        .btn-edit, .btn-hapus {
            padding: 4px 10px;
            font-size: 0.6rem;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <h2 class="page-title">Data Produk Obat</h2>
        
        <a href="{{ route('admin.produk.create') }}" class="btn-tambah">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>

    <!-- PESAN SUKSES -->
    @if(session('success'))
        <div class="alert-custom">
            <span><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</span>
            <i class="fas fa-times" style="cursor: pointer; color: #065f46;" onclick="this.parentElement.style.display='none'"></i>
        </div>
    @endif

    <!-- TABEL DATA -->
    <div class="card-table">
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 60px;">No</th>
                        <th class="text-center" style="width: 80px;">Foto</th>
                        <th>Nama Obat</th>
                        <th style="width: 120px;">Harga</th>
                        <th class="text-center" style="width: 100px;">Stok</th>
                        <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
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
                            <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $item->nama_obat }}</div>
                            <div class="text-muted" style="font-size: 0.65rem;">
                                <i class="fas fa-tag me-1"></i> {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                            </div>
                        </td>
                        <td class="fw-bold" style="color: #e67e22; font-size: 0.85rem;">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>
                        <td class="text-center">
                            @php
                                $stokClass = $item->stok > 10 ? 'stok-banyak' : ($item->stok > 0 ? 'stok-sedang' : 'stok-habis');
                                $stokIcon = $item->stok > 0 ? '📦' : '❌';
                            @endphp
                            <span class="badge-stok {{ $stokClass }}">
                                {{ $stokIcon }} {{ $item->stok }} pcs
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
                            <p>Belum ada data produk yang tersedia</p>
                            <a href="{{ route('admin.produk.create') }}" class="btn-tambah" style="display: inline-flex;">
                                <i class="fas fa-plus"></i> Tambah Produk Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection