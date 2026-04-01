@extends('layouts.admin_master')

@section('content')
<!-- Pastikan FontAwesome terpanggil -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid py-4 px-4">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
            <i class="fas fa-check-circle me-2"></i><strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Kelola Layanan</h4>
            <p class="text-muted small mb-0">Atur layanan kesehatan yang muncul di halaman depan.</p>
        </div>

        <!-- Tombol Tambah (ID Target: #modalTambah) -->
        <button type="button" class="btn btn-primary shadow-sm px-4"
                data-bs-toggle="modal" 
                data-bs-target="#modalTambah">
            <i class="fas fa-plus-circle me-2"></i>Tambah Layanan
        </button>
    </div>

    {{-- DAFTAR LAYANAN --}}
    <div class="row">
        @forelse($layanans as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 transition-hover">
                <div class="card-body text-center p-4">
                    
                    {{-- Tampilan Ikon --}}
                    <div class="icon-box mb-3 mx-auto d-flex align-items-center justify-content-center" 
                         style="width: 70px; height: 70px; background: rgba(26, 188, 156, 0.1); border-radius: 20px;">
                        <div style="font-size: 32px; color: #1ABC9C;">
                            @if(str_contains($item->ikon, 'fa-'))
                                <i class="fas {{ $item->ikon }}"></i>
                            @else
                                <span>{{ $item->ikon }}</span>
                            @endif
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark">{{ $item->nama_layanan }}</h5>
                    <p class="text-muted small mb-4" style="min-height: 40px;">
                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}
                    </p>

                    <hr class="opacity-50">

                    {{-- TOMBOL AKSI --}}
                    <div class="d-flex justify-content-center gap-2">
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-sm btn-outline-warning px-3 rounded-pill"
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEdit{{ $item->id }}">
                            <i class="fas fa-edit me-1"></i> Edit
                        </button>

                        <!-- Hapus Button -->
                        <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger px-3 rounded-pill"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL EDIT (Diletakkan di dalam loop agar mendapat ID masing-masing) --}}
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('admin.layanan.update', $item->id) }}" method="POST" class="modal-content border-0 shadow">
                    @csrf
                    @method('PUT')
                    <div class="modal-header border-0 pb-0">
                        <h5 class="fw-bold">Edit Layanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Layanan</label>
                            <input type="text" name="nama_layanan" value="{{ $item->nama_layanan }}" class="form-control rounded-3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Ikon (FontAwesome / Emoji)</label>
                            <input type="text" name="ikon" value="{{ $item->ikon }}" class="form-control rounded-3" placeholder="Contoh: fa-pills" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control rounded-3" rows="3" required>{{ $item->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        @empty
        <div class="col-12 text-center py-5">
            <img src="https://illustrations.popsy.co/teal/empty-box.svg" style="width: 150px;" class="mb-3 opacity-50">
            <p class="text-muted">Belum ada data layanan yang ditambahkan.</p>
        </div>
        @endforelse
    </div>
</div>

{{-- MODAL TAMBAH (Diletakkan di luar loop) --}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.layanan.store') }}" method="POST" class="modal-content border-0 shadow">
            @csrf
            <div class="modal-header border-0 pb-0">
                <h5 class="fw-bold" id="modalTambahLabel">Tambah Layanan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control rounded-3" placeholder="Misal: Konsultasi Dokter" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ikon (FontAwesome / Emoji)</label>
                    <input type="text" name="ikon" class="form-control rounded-3" placeholder="Contoh: fa-heartbeat atau 💊" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control rounded-3" rows="3" placeholder="Jelaskan sedikit tentang layanan ini..." required></textarea>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-4">Simpan Layanan</button>
            </div>
        </form>
    </div>
</div>

<style>
    .transition-hover:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection