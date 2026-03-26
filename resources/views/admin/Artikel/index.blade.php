@extends('layouts.app') {{-- Sesuaikan dengan nama layout utama Anda --}}

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Artikel</h2>
        <button class="btn btn-primary px-4 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Artikel Baru
        </button>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th class="ps-4 py-3">NO</th>
                        <th class="py-3">JUDUL ARTIKEL</th>
                        <th class="py-3">PENULIS</th>
                        <th class="py-3 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artikels as $key => $item)
                    <tr class="align-middle">
                        <td class="ps-4">{{ $key + 1 }}</td>
                        <td class="fw-bold">{{ $item->judul }}</td>
                        <td>
                            <span class="text-success fw-bold">
                                {{ $item->penulis }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light text-primary border" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">Edit</button>
                            
                            <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light text-danger border" onclick="return confirm('Hapus artikel ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.artikel.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Artikel Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Konten</label>
                    <textarea name="konten" class="form-control" rows="5" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Artikel</button>
            </div>
        </form>
    </div>
</div>
@endsection