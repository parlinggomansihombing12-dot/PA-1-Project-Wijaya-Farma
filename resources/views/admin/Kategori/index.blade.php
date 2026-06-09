@extends('layouts.admin_master')
@section('title', 'Kelola Kategori - Admin Panel')

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
        color: var(--text-muted);
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

    /* ================= KATEGORI WRAPPER ================= */
    .kategori-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .kategori-icon {
        width: 36px;
        height: 36px;
        background: var(--primary-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .kategori-icon i {
        font-size: 1rem;
        color: var(--primary);
    }

    .kategori-name {
        font-weight: 700;
        color: var(--dark);
        font-size: 0.8rem;
    }

    /* ================= DESKRIPSI ================= */
    .kategori-desc {
        font-size: 0.7rem;
        color: var(--text-muted);
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* ================= TOMBOL AKSI ================= */
    .btn-action-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

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
        margin-bottom: 15px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content {
            padding: 10px;
        }
        .page-title {
            font-size: 1rem;
        }
        .btn-tambah {
            padding: 6px 16px;
            font-size: 0.7rem;
        }
        .table-custom thead th,
        .table-custom tbody td {
            padding: 10px 8px;
        }
        .kategori-name {
            font-size: 0.75rem;
        }
        .kategori-icon {
            width: 30px;
            height: 30px;
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
        <h2 class="page-title">
            <i class="fas fa-tags"></i> Kelola Kategori
        </h2>
        <a href="{{ route('admin.kategori.create') }}" class="btn-tambah">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>

    <!-- PESAN SUKSES -->
    @if(session('success'))
    <div class="alert-custom">
        <span><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</span>
        <i class="fas fa-times" onclick="this.parentElement.style.display='none'"></i>
    </div>
    @endif

    <!-- CARD TABEL -->
    <div class="card-table">
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 60px;">No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th class="text-center" style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $item)
                    <tr>
                        <td class="text-center text-muted">{{ $loop->iteration }}</td>
                        <td>
                            <div class="kategori-wrapper">
                                <div class="kategori-icon">
                                    <i class="fas fa-folder"></i>
                                </div>
                                <span class="kategori-name">{{ $item->nama_kategori }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="kategori-desc" title="{{ $item->deskripsi ?? '-' }}">
                                {{ \Illuminate\Support\Str::limit($item->deskripsi ?? '-', 50) }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-action-group">
                                <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" style="display: inline;">
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
                            <i class="fas fa-folder-open"></i>
                            <p>Belum ada data kategori</p>
                            <a href="{{ route('admin.kategori.create') }}" class="btn-tambah" style="display: inline-flex;">
                                <i class="fas fa-plus"></i> Tambah Kategori
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