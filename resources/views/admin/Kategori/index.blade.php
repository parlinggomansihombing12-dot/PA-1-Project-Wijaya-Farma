@extends('layouts.admin_master')
@section('title', 'Kelola Kategori - Admin Panel')

@section('custom-css')
<style>
    :root {
        --primary: #1ABC9C;
        --primary-dark: #16a085;
        --primary-light: #e8f8f5;
        --accent: #e67e22;
        --dark: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
        --shadow-sm: 0 4px 10px rgba(0,0,0,0.03);
        --shadow-md: 0 10px 25px rgba(0,0,0,0.05);
    }

    .content-area {
        background: #f8fafc;
        min-height: 100vh;
    }

    /* ================= HEADER ================= */
    .page-header {
        display: flex; justify-content: space-between; align-items: center;
        flex-wrap: wrap; gap: 15px; margin-bottom: 25px;
    }
    .page-title {
        font-size: 1.5rem; font-weight: 800; color: var(--dark);
        margin: 0; display: flex; align-items: center; gap: 12px;
    }
    .page-title i { color: var(--primary); font-size: 1.6rem; }

    /* ================= TOMBOL TAMBAH ================= */
    .btn-tambah {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white; border: none; padding: 12px 25px; border-radius: 40px;
        font-weight: 700; font-size: 0.95rem; transition: all 0.3s;
        display: inline-flex; align-items: center; gap: 10px; text-decoration: none;
        box-shadow: 0 5px 15px rgba(26,188,156,0.2);
    }
    .btn-tambah:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(26,188,156,0.3); color: white; gap: 14px;}

    /* ================= ALERT ================= */
    .alert-custom {
        background: #d1fae5; border-left: 5px solid var(--primary);
        border-radius: 12px; padding: 15px 20px; margin-bottom: 25px;
        display: flex; align-items: center; justify-content: space-between;
    }
    .alert-custom span { color: #065f46; font-size: 0.95rem; font-weight: 600; }

    /* ================= CARD TABEL ================= */
    .card-table { background: white; border-radius: 20px; border: 1px solid #eef2f6; overflow: hidden; box-shadow: var(--shadow-sm); }
    .table-responsive { overflow-x: auto; }
    .table-custom { width: 100%; margin-bottom: 0; }
    
    .table-custom thead th {
        background: #f8fafc; color: #475569; font-weight: 800; font-size: 0.8rem;
        text-transform: uppercase; letter-spacing: 0.5px; padding: 18px 20px; border-bottom: 2px solid #e2e8f0;
    }
    .table-custom tbody td { padding: 18px 20px; vertical-align: middle; font-size: 0.95rem; color: #334155; border-bottom: 1px solid #f1f5f9; }
    .table-custom tbody tr:hover { background: #f8fafc; }

    /* ================= FOTO & NAMA KATEGORI ================= */
    .kategori-wrapper { display: flex; align-items: center; gap: 15px; }
    .kategori-name { font-weight: 800; color: var(--dark); font-size: 1rem; }
    
    .foto-kategori {
        width: 55px; height: 55px; border-radius: 12px; object-fit: contain; background: white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.06); padding: 5px; border: 1px solid #e2e8f0; transition: 0.3s;
    }
    .table-custom tbody tr:hover .foto-kategori { transform: scale(1.1) rotate(5deg); }
    
    /* Placeholder Icon jika admin tidak upload gambar */
    .icon-placeholder {
        width: 55px; height: 55px; border-radius: 12px; background: var(--primary-light);
        display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--primary);
        box-shadow: 0 4px 10px rgba(26,188,156,0.1); border: 1px solid rgba(26,188,156,0.2);
    }

    /* ================= DESKRIPSI ================= */
    .kategori-desc { font-size: 0.85rem; color: var(--text-muted); max-width: 350px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;}

    /* ================= TOMBOL AKSI ================= */
    .btn-action-group { display: flex; justify-content: center; gap: 10px; }
    
    .btn-edit {
        background: #fef3c7; color: #d97706; padding: 8px 18px; border-radius: 30px;
        font-size: 0.8rem; font-weight: 800; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; border: 1px solid transparent;
    }
    .btn-edit:hover { background: white; color: #d97706; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(245, 158, 11, 0.2); border-color: #f59e0b;}

    .btn-hapus {
        background: #fee2e2; color: #dc2626; border: none; padding: 8px 18px; border-radius: 30px;
        font-size: 0.8rem; font-weight: 800; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px; cursor: pointer; border: 1px solid transparent;
    }
    .btn-hapus:hover { background: white; color: #dc2626; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(220, 38, 38, 0.2); border-color: #ef4444;}

    /* ================= EMPTY STATE ================= */
    .empty-state { text-align: center; padding: 60px 20px; }
    .empty-state i { font-size: 4rem; color: #cbd5e1; margin-bottom: 20px; }
    .empty-state h5 { font-weight: 800; color: #475569; margin-bottom: 10px;}

</style>
@endsection

@section('content')
<div class="content-area">
    
    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <h2 class="page-title"><i class="fas fa-tags"></i> Data Kategori Obat</h2>
        <a href="{{ route('admin.kategori.create') }}" class="btn-tambah"><i class="fas fa-plus"></i> Tambah Kategori Baru</a>
    </div>

    <!-- PESAN SUKSES -->
    @if(session('success'))
        <div class="alert-custom">
            <span><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</span>
            <i class="fas fa-times" style="cursor: pointer;" onclick="this.parentElement.style.display='none'"></i>
        </div>
    @endif

    <!-- CARD TABEL -->
    <div class="card-table">
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Kategori & Foto</th> <!-- Header ini saya gabung -->
                        <th>Deskripsi</th>
                        <th class="text-center" style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $item)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $loop->iteration }}</td>
                        
                        <!-- KODE PINTAR (MENAMPILKAN GAMBAR ASLI DARI DATABASE) -->
                        <td>
                            <div class="kategori-wrapper">
                                @if(isset($item->icon) && $item->icon != '')
                                    <img src="{{ asset('images/kategori/' . $item->icon) }}" class="foto-kategori" alt="{{ $item->nama_kategori }}">
                                @else
                                    <div class="icon-placeholder"><i class="fas fa-folder-open"></i></div>
                                @endif
                                <div class="kategori-name">{{ $item->nama_kategori }}</div>
                            </div>
                        </td>
                        
                        <!-- DESKRIPSI -->
                        <td>
                            <div class="kategori-desc" title="{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}">
                                {{ $item->deskripsi ?? '-' }}
                            </div>
                        </td>

                        <!-- AKSI CRUD -->
                        <td>
                            <div class="btn-action-group">
                                <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Peringatan: Menghapus kategori ini juga akan menghapus/menyembunyikan produk di dalamnya! Lanjutkan?')" style="display: inline;">
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
                        <td colspan="4" class="empty-state">
                            <i class="fas fa-tags opacity-50"></i>
                            <h5>Belum ada kategori yang dibuat</h5>
                            <p class="text-muted">Mulailah dengan menambahkan grup obat pertama Anda.</p>
                            <a href="{{ route('admin.kategori.create') }}" class="btn-tambah mt-3"><i class="fas fa-plus"></i> Buat Kategori Pertama</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection