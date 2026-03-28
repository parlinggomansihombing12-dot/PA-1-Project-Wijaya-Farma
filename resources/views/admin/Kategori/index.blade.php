@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-4">
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header Halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark h4 mb-0">{{ $title }}</h2>
        <button class="btn btn-success px-4 py-2 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-2"></i>Tambah Kategori
        </button>
    </div>

    {{-- Card Tabel --}}
    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="ps-4 py-3 border-0" style="width: 10%">No</th>
                            <th class="py-3 border-0">Nama Kategori</th>
                            <th class="py-3 text-center border-0" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($list_kategori as $key => $item)
                        <tr class="align-middle border-bottom">
                            <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                            <td class="fw-bold text-dark">{{ $item->nama_kategori }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-outline-primary border shadow-sm px-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                        Edit
                                    </button>
                                    {{-- Hapus --}}
                                    <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border shadow-sm px-3" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ route('admin.kategori.update', $item->id) }}" method="POST" class="modal-content border-0 shadow">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header border-0 pt-4 px-4">
                                        <h5 class="fw-bold">Ubah Nama Kategori</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-muted">Nama Kategori</label>
                                            <input type="text" name="nama_kategori" class="form-control" value="{{ $item->nama_kategori }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pb-4 px-4">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted italic">
                                Belum ada data kategori yang tersedia.
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
        <form action="{{ route('admin.kategori.store') }}" method="POST" class="modal-content border-0 shadow">
            @csrf
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="fw-bold">Tambah Kategori Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Contoh: Obat Herbal" required>
                </div>
            </div>
            <div class="modal-footer border-0 pb-4 px-4">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection