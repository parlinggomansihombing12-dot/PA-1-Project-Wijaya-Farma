<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { background-color: #f4f6f9; }
        .sidebar { background:#2C3E50; min-height:100vh; color:white; position:fixed; width:220px; }
        .sidebar a { color:#adb5bd; padding:12px 20px; display:block; text-decoration:none; }
        .sidebar a:hover, .sidebar a.active { background:#1ABC9C; color:white; }
        .content { margin-left:220px; padding:30px; }

        .card-layanan { border-radius:15px; transition:0.3s; }
        .card-layanan:hover { transform: translateY(-5px); }

        .icon-circle {
            width:80px;height:80px;background:#e0f7f4;color:#1ABC9C;
            border-radius:50%;display:flex;align-items:center;justify-content:center;
            margin:auto;font-size:30px;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h4 class="text-center mt-3">💊 Admin</h4>
    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/layanan" class="active">Layanan</a>
</div>

<div class="content">

    <div class="d-flex justify-content-between mb-4">
        <h3>Kelola Layanan</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($layanans as $item)
        <div class="col-md-4 mb-4">
            <div class="card card-layanan text-center p-3 shadow-sm">

                <div class="icon-circle">
                    <i class="fas {{ $item->ikon }}"></i>
                </div>

                <h5>{{ $item->nama_layanan }}</h5>
                <p class="text-muted">{{ $item->deskripsi }}</p>

                <div class="mt-3">
                    <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $item->id }}">
                        Edit
                    </button>

                    <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <form action="{{ route('admin.layanan.store') }}" method="POST">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Layanan</h5>
                </div>

                <div class="modal-body">
                    <input type="text" name="nama_layanan" class="form-control mb-2" placeholder="Nama" required>
                    <input type="text" name="ikon" class="form-control mb-2" placeholder="fa-pills" required>
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required></textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT (DI LUAR LOOP HTML UTAMA) ================= --}}
@foreach($layanans as $item)
<div class="modal fade" id="edit{{ $item->id }}">
    <div class="modal-dialog">
        <form action="{{ route('admin.layanan.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Layanan</h5>
                </div>

                <div class="modal-body">
                    <input type="text" name="nama_layanan" value="{{ $item->nama_layanan }}" class="form-control mb-2">
                    <input type="text" name="ikon" value="{{ $item->ikon }}" class="form-control mb-2">
                    <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-warning">Update</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>