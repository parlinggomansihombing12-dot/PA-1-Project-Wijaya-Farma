@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-4">
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
        <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm" style="border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Artikel Baru
        </button>
    </div>

    {{-- Card Tabel (Sama seperti tampilan produk) --}}
    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    {{-- Header tabel dengan style abu-abu seperti gambar produk --}}
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
                        <tr class="align-middle border-bottom" style="border-color: #f8f9fa !important;">
                            <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                            <td class="fw-bold text-dark">{{ $item->judul }}</td>
                            <td>
                                <span class="text-success fw-bold">
                                    {{ $item->penulis }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Tombol Edit --}}
                                    <button class="btn btn-sm btn-light text-primary border shadow-sm px-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                        Edit
                                    </button>
                                    
                                    {{-- Tombol Delete --}}
                                    <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger border shadow-sm px-3" onclick="return confirm('Hapus artikel ini?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ route('admin.artikel.update', $item->id) }}" method="POST" class="modal-content border-0 shadow">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header border-bottom-0 pt-4 px-4">
                                        <h5 class="fw-bold">Edit Artikel</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Judul</label>
                                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required style="background-color: #f8f9fa;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Penulis</label>
                                            <input type="text" name="penulis" class="form-control" value="{{ $item->penulis }}" required style="background-color: #f8f9fa;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Konten</label>
                                            <textarea name="konten" class="form-control" rows="5" required style="background-color: #f8f9fa;">{{ $item->konten }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 pb-4 px-4">
                                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @empty
                        {{-- Tampilan saat data kosong (Sesuai Gambar Produk) --}}
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <span class="text-muted fs-6 italic">Belum ada data artikel yang tersedia.</span>
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
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.artikel.store') }}" method="POST" class="modal-content border-0 shadow">
            @csrf
            <div class="modal-header border-bottom-0 pt-4 px-4">
                <h5 class="fw-bold">Tambah Artikel Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul artikel" required style="background-color: #f8f9fa;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Penulis</label>
                    <input type="text" name="penulis" class="form-control" placeholder="Nama penulis" required style="background-color: #f8f9fa;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Konten</label>
                    <textarea name="konten" class="form-control" rows="5" placeholder="Tulis isi artikel di sini..." required style="background-color: #f8f9fa;"></textarea>
                </div>
            </div>
            <div class="modal-footer border-top-0 pb-4 px-4">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary px-4">Simpan Artikel</button>
            </div>
        </form>
    </div>
</div>
@endsection