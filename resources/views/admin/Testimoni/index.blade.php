@extends('layouts.admin_master')
@section('title', 'Kelola Testimoni - Admin Panel')

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
        background: var(--dark);
        color: white;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 12px;
        border-bottom: none;
    }

    .table-custom tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        font-size: 0.75rem;
        color: var(--text-muted);
        border-bottom: 1px solid #eef2f6;
    }

    .table-custom tbody tr:hover {
        background: #f8fafc;
    }

    /* Baris Pending */
    .tr-pending {
        background: #fffbeb;
    }

    .tr-pending:hover {
        background: #fef3c7 !important;
    }

    /* ================= NAMA PELANGGAN ================= */
    .customer-name {
        font-weight: 700;
        color: var(--dark);
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .customer-icon {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, var(--primary-light), #e2e8f0);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .customer-icon i {
        font-size: 0.8rem;
        color: var(--primary);
    }

    /* ================= RATING - SATU BARIS ================= */
    .rating-wrapper {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f8fafc;
        padding: 5px 12px;
        border-radius: 40px;
        white-space: nowrap;
    }

    .rating-stars {
        display: inline-flex;
        align-items: center;
        gap: 2px;
    }

    .star-filled {
        color: #fbbf24;
        font-size: 0.8rem;
    }

    .star-empty {
        color: #e2e8f0;
        font-size: 0.8rem;
    }

    .rating-number {
        background: var(--primary-light);
        color: var(--primary-dark);
        padding: 2px 8px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
    }

    /* ================= KOMENTAR ================= */
    .komentar-text {
        max-width: 300px;
        white-space: normal;
        word-wrap: break-word;
        line-height: 1.5;
        font-style: italic;
    }

    .komentar-text::before {
        content: '"';
        font-size: 1rem;
        color: var(--primary-light);
    }

    .komentar-text::after {
        content: '"';
        font-size: 1rem;
        color: var(--primary-light);
    }

    /* ================= BADGE STATUS ================= */
    .badge-pending {
        background: #fef3c7;
        color: #b45309;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .badge-approved {
        background: #d1fae5;
        color: #065f46;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    /* ================= TOMBOL AKSI ================= */
    .btn-approve {
        background: #d1fae5;
        color: #065f46;
        border: none;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }

    .btn-approve:hover {
        background: #10b981;
        color: white;
        transform: translateY(-1px);
    }

    .btn-delete {
        background: #fee2e2;
        color: #991b1b;
        border: none;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #ef4444;
        color: white;
        transform: translateY(-1px);
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
        font-size: 0.8rem;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content {
            padding: 10px;
        }
        .page-header h2 {
            font-size: 1rem;
        }
        .table-custom thead th,
        .table-custom tbody td {
            padding: 10px 8px;
            font-size: 0.7rem;
        }
        .customer-name {
            font-size: 0.75rem;
        }
        .customer-icon {
            width: 28px;
            height: 28px;
        }
        .rating-stars .star-filled,
        .rating-stars .star-empty {
            font-size: 0.7rem;
        }
        .rating-wrapper {
            padding: 3px 8px;
        }
        .rating-number {
            font-size: 0.6rem;
        }
        .btn-approve, .btn-delete {
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
        <h2>
            <i class="fas fa-star"></i> Kelola Testimoni Pelanggan
        </h2>
    </div>

    <!-- ALERT SUKSES -->
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
                        <th>Nama Pelanggan</th>
                        <th class="text-center" style="width: 140px;">Rating</th>
                        <th>Ulasan / Komentar</th>
                        <th class="text-center" style="width: 150px;">Status</th>
                        <th class="text-center" style="width: 180px;">Aksi Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonis as $item)
                    <tr class="{{ $item->status == 'pending' ? 'tr-pending' : '' }}">
                        <!-- No -->
                        <td class="text-center text-muted">{{ $loop->iteration }}</td>
                        
                        <!-- Nama Pelanggan -->
                        <td>
                            <div class="customer-name">
                                <div class="customer-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                {{ $item->nama_pelanggan }}
                            </div>
                        </td>
                        
                        <!-- Rating - SATU BARIS -->
                        <td class="text-center">
                            <div class="rating-wrapper">
                                <div class="rating-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->rating)
                                            <i class="fas fa-star star-filled"></i>
                                        @else
                                            <i class="far fa-star star-empty"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="rating-number">{{ $item->rating }}/5</span>
                            </div>
                        </td>
                        
                        <!-- Komentar -->
                        <td>
                            <div class="komentar-text">
                                {{ \Illuminate\Support\Str::limit($item->komentar, 80) }}
                            </div>
                        </td>
                        
                        <!-- Status -->
                        <td class="text-center">
                            @if($item->status == 'pending')
                                <span class="badge-pending">
                                    <i class="fas fa-clock"></i> Menunggu
                                </span>
                            @else
                                <span class="badge-approved">
                                    <i class="fas fa-check-circle"></i> Ditampilkan
                                </span>
                            @endif
                        </td>
                        
                        <!-- Aksi Admin -->
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                @if($item->status == 'pending')
                                    <form action="{{ route('admin.testimoni.update', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-approve">
                                            <i class="fas fa-check"></i> Setujui
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.testimoni.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        <i class="fas fa-trash-alt"></i> Tolak/Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="empty-state">
                            <i class="fas fa-comment-dots"></i>
                            <p>Belum ada ulasan dari pelanggan</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection