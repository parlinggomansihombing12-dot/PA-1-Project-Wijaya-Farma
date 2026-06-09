@extends('layouts.admin_master')

@section('title', 'Kelola Layanan - Admin Panel')

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
        --shadow-lg: 0 8px 20px rgba(0,0,0,0.08);
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

    .page-title h4 {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0 0 5px 0;
    }

    .page-title p {
        font-size: 0.7rem;
        color: var(--text-muted);
        margin: 0;
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
        gap: 12px;
    }

    .alert-custom i {
        font-size: 1rem;
        color: #065f46;
    }

    .alert-custom span {
        color: #065f46;
        font-size: 0.75rem;
        font-weight: 500;
        flex: 1;
    }

    .alert-custom .close-alert {
        cursor: pointer;
        color: #065f46;
        font-size: 0.8rem;
    }

    /* ================= GRID LAYANAN ================= */
    .layanan-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    /* ================= CARD LAYANAN ================= */
    .card-layanan {
        background: white;
        border-radius: 16px;
        border: 1px solid #eef2f6;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .card-layanan:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-light);
    }

    .card-body {
        padding: 18px;
        text-align: center;
    }

    /* ================= FOTO ================= */
    .foto-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 15px;
        background: #f8fafc;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid var(--primary-light);
        overflow: hidden;
    }

    .foto-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .foto-placeholder {
        font-size: 2rem;
        color: #cbd5e1;
    }

    /* ================= TEKS ================= */
    .layanan-title {
        font-size: 0.9rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .layanan-desc {
        font-size: 0.7rem;
        color: var(--text-muted);
        line-height: 1.5;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 36px;
    }

    hr {
        margin: 12px 0;
        border-color: #eef2f6;
    }

    /* ================= TOMBOL AKSI ================= */
    .btn-edit {
        background: #fef3c7;
        color: #b45309;
        border: none;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
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
        font-size: 0.65rem;
        font-weight: 700;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
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
        background: white;
        border-radius: 16px;
    }

    .empty-state i {
        font-size: 3rem;
        color: #cbd5e1;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: var(--text-muted);
        font-size: 0.8rem;
        margin-bottom: 5px;
    }

    .empty-state small {
        font-size: 0.7rem;
    }

    /* ================= MODAL ================= */
    .modal-custom .modal-content {
        border-radius: 16px;
        border: none;
        overflow: hidden;
    }

    .modal-header-custom {
        padding: 15px 20px;
        border-bottom: 1px solid #eef2f6;
    }

    .modal-header-custom h5 {
        font-size: 0.95rem;
        font-weight: 800;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .modal-body-custom {
        padding: 20px;
    }

    .modal-footer-custom {
        padding: 15px 20px;
        border-top: 1px solid #eef2f6;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .form-label-custom {
        font-size: 0.7rem;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
        display: block;
    }

    .form-control-custom {
        width: 100%;
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

    .preview-foto {
        background: #f8fafc;
        border-radius: 12px;
        padding: 12px;
        text-align: center;
        margin-top: 10px;
    }

    .preview-foto img {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1100px) {
        .layanan-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 800px) {
        .layanan-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 500px) {
        .layanan-grid {
            grid-template-columns: 1fr;
        }
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endsection

@section('content')
<div class="content">
    
    <!-- HEADER -->
    <div class="page-header">
        <div class="page-title">
            <h4><i class="fas fa-notes-medical me-2" style="color: var(--primary);"></i> Kelola Layanan</h4>
            <p>Atur layanan kesehatan yang muncul di halaman depan</p>
        </div>
        <button type="button" class="btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus-circle"></i> Tambah Layanan
        </button>
    </div>

    <!-- ALERT SUCCESS -->
    @if(session('success'))
    <div class="alert-custom">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
        <i class="fas fa-times close-alert" onclick="this.parentElement.style.display='none'"></i>
    </div>
    @endif

    <!-- GRID LAYANAN -->
    <div class="layanan-grid">
        @forelse($layanans as $item)
        <div class="card-layanan">
            <div class="card-body">
                <!-- FOTO -->
                <div class="foto-wrapper">
                    @if($item->foto)
                        <img src="{{ asset('images/layanan/' . $item->foto) }}" alt="{{ $item->nama_layanan }}">
                    @else
                        <div class="foto-placeholder">
                            <i class="fas fa-hand-holding-medical"></i>
                        </div>
                    @endif
                </div>

                <!-- JUDUL -->
                <h5 class="layanan-title">{{ $item->nama_layanan }}</h5>

                <!-- DESKRIPSI -->
                <p class="layanan-desc">{{ \Illuminate\Support\Str::limit($item->deskripsi, 60) }}</p>

                <hr>

                <!-- TOMBOL AKSI -->
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </button>

                    <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL EDIT -->
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.layanan.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    @method('PUT')
                    <div class="modal-header-custom">
                        <h5><i class="fas fa-edit" style="color: var(--primary);"></i> Edit Layanan</h5>
                    </div>
                    <div class="modal-body-custom">
                        <div class="mb-3">
                            <label class="form-label-custom">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_layanan" class="form-control-custom" value="{{ $item->nama_layanan }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label-custom">Ganti Foto</label>
                            <input type="file" name="foto" class="form-control-custom" accept="image/*">
                            <small class="text-muted" style="font-size: 0.6rem;">Kosongkan jika tidak ingin mengubah foto</small>
                            @if($item->foto)
                            <div class="preview-foto">
                                <img src="{{ asset('images/layanan/' . $item->foto) }}" alt="Foto saat ini">
                                <div class="mt-1"><small>Foto saat ini</small></div>
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label-custom">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control-custom" rows="4" required>{{ $item->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer-custom">
                        <button type="button" class="btn-edit" style="background: #f1f5f9; color: #64748b;" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-tambah" style="margin: 0;">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-notes-medical"></i>
            <p>Belum ada data layanan</p>
            <small>Klik tombol "Tambah Layanan" untuk mulai menambahkan</small>
        </div>
        @endforelse
    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header-custom">
                    <h5><i class="fas fa-plus-circle" style="color: var(--primary);"></i> Tambah Layanan Baru</h5>
                </div>
                <div class="modal-body-custom">
                    <div class="mb-3">
                        <label class="form-label-custom">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_layanan" class="form-control-custom" placeholder="Contoh: Cek Gula Darah" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">Foto Layanan</label>
                        <input type="file" name="foto" class="form-control-custom" accept="image/*">
                        <small class="text-muted" style="font-size: 0.6rem;">Format: JPG, PNG. Maksimal 2MB</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" class="form-control-custom" rows="4" placeholder="Jelaskan layanan ini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer-custom">
                    <button type="button" class="btn-edit" style="background: #f1f5f9; color: #64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-tambah" style="margin: 0;">Simpan Layanan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection