<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan - Apotek Wijaya Farma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan FontAwesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { 
            background-color: #2C3E50; 
            min-height: 100vh; 
            color: white; 
            padding-top: 20px; 
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            position: fixed;
            width: inherit;
        }
        .sidebar a { 
            color: #adb5bd; 
            text-decoration: none; 
            padding: 12px 20px; 
            display: block; 
            font-weight: 500;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active { 
            background-color: #1ABC9C; 
            color: white; 
            border-left: 4px solid #fff;
        }
        .content { padding: 30px; }
        .card-layanan { transition: transform 0.3s; border: none; border-radius: 15px; }
        .card-layanan:hover { transform: translateY(-5px); }
        .icon-circle {
            width: 80px;
            height: 80px;
            background: #e0f7f4;
            color: #1ABC9C;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 30px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- SIDEBAR (MENU KIRI) -->
        <div class="col-md-2 p-0">
            <div class="sidebar col-md-2">
                <h4 class="text-center mb-4 text-white fw-bold mt-3">💊 Admin Panel</h4>
                
                <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
                <a href="/admin/produk" class="{{ request()->is('admin/produk') ? 'active' : '' }}">📦 Kelola Produk</a>
                <a href="/admin/kategori" class="{{ request()->is('admin/kategori') ? 'active' : '' }}">📂 Kelola Kategori</a>
                <a href="/admin/layanan" class="{{ request()->is('admin/layanan') ? 'active' : '' }}">⚕️ Kelola Layanan</a>
                <a href="/admin/artikel" class="{{ request()->is('admin/artikel') ? 'active' : '' }}">📝 Kelola Artikel</a>
                <a href="/admin/testimoni" class="{{ request()->is('admin/testimoni') ? 'active' : '' }}">⭐ Kelola Testimoni</a>
                <a href="/admin/profil" class="{{ request()->is('admin/profil') ? 'active' : '' }}">⚙️ Profil Toko</a>
                
                <hr class="text-secondary mx-3">
                
                <div class="px-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 btn-sm">Keluar (Logout)</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- KONTEN UTAMA (KANAN) -->
        <div class="col-md-10 content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold" style="color: #2C3E50;">Kelola Layanan</h2>
                <button class="btn btn-primary fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Layanan
                </button>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- GRID LAYANAN (Mirip Halaman Pengunjung) -->
            <div class="row">
                @foreach($layanans as $item)
                <div class="col-md-4 mb-4">
                    <div class="card card-layanan shadow-sm h-100 text-center p-3">
                        <div class="card-body p-2">
                            <div class="icon-circle shadow-sm">
                                <i class="fas {{ $item->ikon }}"></i>
                            </div>
                            <h5 class="card-title fw-bold text-dark">{{ $item->nama_layanan }}</h5>
                            <p class="card-text text-muted small px-2">{{ $item->deskripsi }}</p>
                            
                            <div class="mt-4 pt-3 border-top d-flex justify-content-center gap-2">
                                <button class="btn btn-warning btn-sm fw-bold px-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                
                                <form action="{{ url('/admin/layanan/'.$item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm fw-bold px-3">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL EDIT -->
                <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ url('/admin/layanan/'.$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title fw-bold">Edit Layanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Layanan</label>
                                        <input type="text" name="nama_layanan" class="form-control" value="{{ $item->nama_layanan }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Ikon (FontAwesome)</label>
                                        <input type="text" name="ikon" class="form-control" value="{{ $item->ikon }}" placeholder="Contoh: fa-pills" required>
                                        <small class="text-muted">Cek kode ikon di <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a></small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Deskripsi Singkat</label>
                                        <textarea name="deskripsi" class="form-control" rows="3" required>{{ $item->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer bg-light">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-warning fw-bold">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/admin/layanan') }}" method="POST">
            @csrf
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold">Tambah Layanan Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: Cek Kolesterol" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ikon (FontAwesome)</label>
                        <input type="text" name="ikon" class="form-control" placeholder="Contoh: fa-heartbeat" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi Singkat</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan sedikit tentang layanan ini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary fw-bold">Tambah Sekarang</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>