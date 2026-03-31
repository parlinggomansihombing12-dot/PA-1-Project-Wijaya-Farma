@extends('layouts.admin_master')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Kelola Testimoni</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Testimoni
        </button>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- TABEL --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th width="15%">Rating</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($testimonis as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>{{ $item->komentar }}</td>

                        {{-- BINTANG --}}
                        <td class="text-center">
                            @for($i = 1; $i <= ($item->rating ?? 0); $i++)
                                ⭐
                            @endfor
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#edit{{ $item->id }}">
                                Edit
                            </button>

                            <form action="{{ route('admin.testimoni.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" 
                                        class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- MODAL EDIT --}}
                    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('admin.testimoni.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Testimoni</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="nama_pelanggan"
                                                value="{{ $item->nama_pelanggan }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Komentar</label>
                                            <textarea name="komentar"
                                                class="form-control"
                                                rows="3"
                                                required>{{ $item->komentar }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Rating</label>
                                            <input type="number" name="rating"
                                                value="{{ $item->rating }}"
                                                min="1" max="5"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-warning">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Belum ada data testimoni
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.testimoni.store') }}" method="POST">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Testimoni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama_pelanggan"
                            class="form-control"
                            placeholder="Nama Pelanggan" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Komentar</label>
                        <textarea name="komentar"
                            class="form-control"
                            rows="3"
                            placeholder="Isi komentar..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <input type="number" name="rating"
                            class="form-control"
                            min="1" max="5"
                            placeholder="1 - 5" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection