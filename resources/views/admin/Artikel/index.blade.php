@extends('layouts.admin_master')
@section('title', 'Kelola Artikel & Kategori - Admin Panel')

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

    .page-header h2 {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .page-header h2 i {
        color: var(--primary);
        font-size: 1.1rem;
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

    /* ================= CARD ================= */
    .card-custom {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef2f6;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }

    .card-header-custom {
        padding: 14px 18px;
        background: linear-gradient(135deg, #f8fafc, white);
        border-bottom: 1px solid #eef2f6;
    }

    .card-header-custom h6 {
        font-size: 0.85rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .card-header-custom h6 i {
        color: var(--primary);
        font-size: 0.9rem;
    }

    .card-body-custom {
        padding: 18px;
    }

    /* ================= FORM TAMBAH KATEGORI ================= */
    .form-kategori {
        display: flex;
        gap: 10px;
    }

    .form-control-custom {
        flex: 1;
        padding: 8px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.75rem;
        transition: all 0.2s;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(26,188,156,0.1);
    }

    /* ================= TOMBOL ================= */
    .btn-primary-custom {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.7rem;
        transition: all 0.2s;
        cursor: pointer;
    }

    .btn-primary-custom:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(26,188,156,0.25);
    }

    .btn-success-custom {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 6px 16px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.7rem;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-success-custom:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(26,188,156,0.25);
        color: white;
    }

    /* ================= TABEL KATEGORI ================= */
    .table-kategori {
        width: 100%;
    }

    .table-kategori thead th {
        background: #f8fafc;
        padding: 10px 12px;
        font-size: 0.65rem;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #eef2f6;
    }

    .table-kategori tbody td {
        padding: 10px 12px;
        font-size: 0.75rem;
        color: var(--dark);
        border-bottom: 1px solid #eef2f6;
    }

    .table-kategori tbody tr:hover {
        background: #f8fafc;
    }

    .kategori-name {
        display: inline-block;
        padding: 4px 12px;
        background: var(--primary-light);
        color: var(--primary-dark);
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .btn-hapus-kategori {
        background: #fee2e2;
        color: #991b1b;
        border: none;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-hapus-kategori:hover {
        background: #ef4444;
        color: white;
    }

    /* ================= TABEL ARTIKEL ================= */
    .table-artikel {
        width: 100%;
    }

    .table-artikel thead th {
        background: var(--dark);
        color: white;
        padding: 12px 12px;
        font-size: 0.7rem;
        font-weight: 700;
    }

    .table-artikel tbody td {
        padding: 12px 12px;
        font-size: 0.75rem;
        color: var(--text-muted);
        border-bottom: 1px solid #eef2f6;
        vertical-align: middle;
    }

    .table-artikel tbody tr:hover {
        background: #f8fafc;
    }

    .judul-artikel {
        font-weight: 700;
        color: var(--dark);
        font-size: 0.8rem;
        margin-bottom: 4px;
    }

    .tanggal-artikel {
        font-size: 0.6rem;
        color: var(--text-muted);
    }

    /* Badge Kategori untuk Artikel */
    .badge-kategori {
        display: inline-block;
        padding: 4px 12px;
        background: var(--primary-light);
        color: var(--primary-dark);
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
    }

    /* ================= TOMBOL AKSI ARTIKEL ================= */
    .btn-edit-artikel {
        background: #fef3c7;
        color: #b45309;
        border: none;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s;
    }

    .btn-edit-artikel:hover {
        background: #f59e0b;
        color: white;
        transform: translateY(-1px);
    }

    .btn-hapus-artikel {
        background: #fee2e2;
        color: #991b1b;
        border: none;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-hapus-artikel:hover {
        background: #ef4444;
        color: white;
        transform: translateY(-1px);
    }

    /* ================= EMPTY STATE ================= */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
    }

    .empty-state i {
        font-size: 2.5rem;
        color: #cbd5e1;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: var(--text-muted);
        font-size: 0.75rem;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .card-body-custom {
            padding: 15px;
        }
        .judul-artikel {
            font-size: 0.75rem;
        }
        .btn-edit-artikel, .btn-hapus-artikel {
            padding: 4px 8px;
            font-size: 0.6rem;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER -->
    <div class="page-header">
        <h2>
            <i class="fas fa-newspaper"></i> Kelola Artikel & Kategori
        </h2>
    </div>

    <!-- ALERT SUKSES -->
    @if(session('success'))
    <div class="alert-custom">
        <span><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</span>
        <i class="fas fa-times" onclick="this.parentElement.style.display='none'"></i>
    </div>
    @endif

    <!-- DUA KOLOM -->
    <div class="row g-3">
        
        <!-- KOLOM KIRI - KATEGORI ARTIKEL -->
        <div class="col-lg-4">
            
            <!-- CARD TAMBAH KATEGORI -->
            <div class="card-custom mb-3">
                <div class="card-header-custom">
                    <h6><i class="fas fa-tags"></i> Tambah Kategori Artikel</h6>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('admin.kategori-artikel.store') }}" method="POST" class="form-kategori">
                        @csrf
                        <input type="text" name="nama_kategori" class="form-control-custom" 
                               placeholder="Misal: Obat & Suplemen" required>
                        <button type="submit" class="btn-primary-custom">Simpan</button>
                    </form>
                </div>
            </div>

            <!-- CARD DAFTAR KATEGORI -->
            <div class="card-custom">
                <div class="card-header-custom">
                    <h6><i class="fas fa-list"></i> Daftar Kategori</h6>
                </div>
                <div class="card-body-custom p-0">
                    <table class="table-kategori">
                        <thead>
                            <tr><th>Nama Kategori</th><th class="text-center" style="width: 80px;">Aksi</th></tr>
                        </thead>
                        <tbody>
                            @forelse($kategori_artikel as $kat)
                            <tr>
                                <td>
                                    <span class="kategori-name">
                                        <i class="fas fa-folder me-1"></i> {{ $kat->nama_kategori }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.kategori-artikel.destroy', $kat->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-hapus-kategori">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="2" class="empty-state"><i class="fas fa-folder-open"></i><p>Belum ada kategori</p></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN - DAFTAR ARTIKEL -->
        <div class="col-lg-8">
            <div class="card-custom">
                <div class="card-header-custom d-flex justify-content-between align-items-center">
                    <h6><i class="fas fa-newspaper"></i> Daftar Artikel</h6>
                    <a href="{{ route('admin.artikel.create') }}" class="btn-success-custom">
                        <i class="fas fa-plus"></i> Tulis Artikel
                    </a>
                </div>
                <div class="card-body-custom p-0">
                    <div class="table-responsive">
                        <table class="table-artikel">
                            <thead>
                                <tr>
                                    <th style="width: 50px;" class="text-center">No</th>
                                    <th>Judul Artikel</th>
                                    <th style="width: 140px;">Kategori</th>
                                    <th style="width: 130px;" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($artikels as $item)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="judul-artikel">{{ \Illuminate\Support\Str::limit($item->judul, 45) }}</div>
                                        <div class="tanggal-artikel">
                                            <i class="far fa-calendar-alt me-1"></i> {{ $item->created_at->format('d M Y') }}
                                        </div>
                                     </td>
                                    <td>
                                        @if($item->kategori_artikel)
                                            <span class="badge-kategori">
                                                <i class="fas fa-tag me-1"></i> {{ $item->kategori_artikel }}
                                            </span>
                                        @else
                                            <span class="badge-kategori" style="background: #e2e8f0; color: #64748b;">
                                                <i class="fas fa-question-circle me-1"></i> Tanpa Kategori
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn-edit-artikel">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel ini?');" style="display: inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-hapus-artikel">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="empty-state"><i class="fas fa-newspaper"></i><p>Belum ada artikel</p></td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection