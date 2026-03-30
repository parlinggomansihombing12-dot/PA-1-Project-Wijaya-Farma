@extends('admin.layout')

@section('content')
<div class="container-fluid py-4 px-4">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <strong>Oops!</strong> Ada kesalahan:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Kelola Layanan</h4>

        <button class="btn btn-primary shadow-sm"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah">
            <i class="fas fa-plus me-1"></i> Tambah
        </button>
    </div>

    {{-- CARD --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="row">
                @forelse($layanans as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center border-0 shadow-sm p-3">

                        {{-- ICON --}}
                        <div class="mb-3">
                            <div style="font-size: 40px; color: #1ABC9C;">
                                @if(str_contains($item->ikon, 'fa-'))
                                    <i class="fas {{ $item->ikon }}"></i>
                                @else
                                    <span>{{ $item->ikon }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- TITLE --}}
                        <h5 class="fw-bold">{{ $item->nama_layanan }}</h5>

                        {{-- DESC --}}
                        <p class="text-muted small">
                            {{ $item->deskripsi }}
                        </p>

                        {{-- ACTION --}}
                        <div class="mt-auto pt-3 border-top d-flex justify-content-center gap-2">

                            <button class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $item->id }}">
                                Edit
                            </button>

                            <form action="{{ route('admin.layanan.destroy', $item->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus layanan ini?')"
                                        class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </div>
                </div>

                {{-- MODAL EDIT --}}
                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('admin.layanan.update', $item->id) }}"
                              method="POST"
                              class="modal-content">
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5 class="modal-title">Edit Layanan</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Nama Layanan</label>
                                    <input type="text"
                                           name="nama_layanan"
                                           value="{{ $item->nama_layanan }}"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ikon (FontAwesome / Emoji)</label>
                                    <input type="text"
                                           name="ikon"
                                           value="{{ $item->ikon }}"
                                           class="form-control"
                                           placeholder="Contoh: fa-pills atau 💊"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi"
                                              class="form-control"
                                              rows="3"
                                              required>{{ $item->deskripsi }}</textarea>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>

                @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="fas fa-box-open fa-2x mb-2"></i>
                    <p>Belum ada data layanan</p>
                </div>
                @endforelse
            </div>

        </div>
    </div>

</div>

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.layanan.store') }}"
              method="POST"
              class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Layanan</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text"
                           name="nama_layanan"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ikon (FontAwesome / Emoji)</label>
                    <input type="text"
                           name="ikon"
                           class="form-control"
                           placeholder="Contoh: fa-heartbeat atau ❤️"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
</div>

@endsection