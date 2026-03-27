@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-4" style="position: relative; z-index: 1;">
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header Halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark h4 mb-0">Data Artikel</h2>
        <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm" style="border-radius: 8px; position: relative; z-index: 10;" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-1"></i> Tambah Artikel Baru
        </button>
    </div>

    {{-- Card Tabel --}}
    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary text-uppercase" style="font-size: 0.85rem; letter-spacing: 0.5px;">
                        <tr>
                            <th class="ps-4 py-3 border-0">NO</th>
                            <th class="py-3 border-0">JUDUL ARTIKEL</th>
                            <th class="py-3 border-0">PENULIS</th>
                            <th class="py-3 text-center border-0">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($artikels as $key => $item)
                        <tr class="border-bottom" style="border-color: #f8f9fa !important;">
                            <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                            <td class="fw-bold text-dark">{{ $item->judul }}</td>
                            <td>
                                <span class="badge bg-soft-success text-success fw-bold px-3 py-2" style="background-color: #e8f5e9;">
                                    {{ $item->penulis }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Tombol Edit --}}
                                    <button type="button" class="btn btn-sm btn-outline-primary border shadow-sm px-3" 
                                            data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </button>
                                    
                                    {{-- Tombol Delete --}}
                                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" class="d-inline m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border shadow-sm px-3" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                            <i class="fas fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Edit (Ditaruh di dalam loop agar ID-nya unik) --}}
                        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <form action="{{ route('admin.artikel.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header border-0 pt-4 px-4">
                                            <h5 class="fw-bold" id="modalEditLabel{{ $item->id }}">Edit Artikel</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-4">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Judul</label>
                                                <input type="text" name="judul" class="form-control bg-light border-0" value="{{ $item->judul }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Penulis</label>
                                                <input type="text" name="penulis" class="form-control bg-light border-0" value="{{ $item->penulis }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Konten</label>
                                                <textarea name="konten" class="form-control bg-light border-0" rows="5" required>{{ $item->konten }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pb-4 px-4">
                                            <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary px-4 shadow-sm">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <div class="text-muted fs-6 italic">
                                    <i class="fas fa-folder-open d-block mb-2 fs-3"></i>
                                    Belum ada data artikel yang tersedia.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.artikel.store') }}" method="POST">
                @csrf
                <div class="modal-header border-0 pt-4 px-4">
                    <h5 class="fw-bold" id="modalTambahLabel">Tambah Artikel Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul</label>
                        <input type="text" name="judul" class="form-control bg-light border-0" placeholder="Masukkan judul artikel" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penulis</label>
                        <input type="text" name="penulis" class="form-control bg-light border-0" placeholder="Nama penulis" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Konten</label>
                        <textarea name="konten" class="form-control bg-light border-0" rows="5" placeholder="Tulis isi artikel di sini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Simpan Artikel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection