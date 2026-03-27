@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-4">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Header --}}
    <div class="d-flex justify-content-between mb-3">
        <h4>Data Artikel</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Artikel
        </button>
    </div>

    {{-- Tabel --}}
    <div class="card">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td class="text-center">

                            {{-- EDIT --}}
                            <button class="btn btn-sm btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEdit{{ $item->id }}">
                                Edit
                            </button>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.artikel.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5>Tambah Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
                    <input type="text" name="penulis" class="form-control mb-2" placeholder="Penulis" required>
                    <textarea name="konten" class="form-control" placeholder="Konten" required></textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- ================= MODAL EDIT (PENTING: DI LUAR TABEL) ================= --}}
@foreach($artikels as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('admin.artikel.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5>Edit Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="text" name="judul" value="{{ $item->judul }}" class="form-control mb-2" required>
                    <input type="text" name="penulis" value="{{ $item->penulis }}" class="form-control mb-2" required>
                    <textarea name="konten" class="form-control" required>{{ $item->konten }}</textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach

@endsection