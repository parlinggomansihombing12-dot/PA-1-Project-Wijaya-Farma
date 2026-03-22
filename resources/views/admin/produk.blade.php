<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { background-color: #2C3E50; min-height: 100vh; color: white; padding-top: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1); }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 12px 20px; display: block; font-weight: 500; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: #1ABC9C; color: white; border-left: 4px solid #fff; }
        .content { padding: 30px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center mb-4 text-white fw-bold mt-3">💊 Admin Panel</h4>
            
            <a href="/admin/dashboard">🏠 Dashboard</a>
            
            <!-- Perhatikan: Sekarang "Kelola Produk" yang punya class "active" -->
            <a href="/admin/produk" class="active">📦 Kelola Produk</a>
            
            <a href="/admin/kategori"> 📁 Kelola Kategori</a>
            <a href="/admin/layanan">⚕️ Kelola Layanan</a>
            <a href="/admin/artikel">📝 Kelola Artikel</a>
            <a href="/admin/testimoni">⭐ Kelola Testimoni</a>
            <a href="/admin/profil">⚙️ Profil Toko</a>
            
            <hr class="text-secondary mx-3">
            <div class="px-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Keluar (Logout)</button>
                </form>
            </div>
        </div>

        <!-- KONTEN UTAMA: TABEL PRODUK -->
        <div class="col-md-10 content">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold" style="color: #2C3E50;">Data Produk Obat</h2>
                <!-- Tombol Tambah Produk (Nanti kita buat fungsinya) -->
                <a href="#" class="btn btn-primary fw-bold">+ Tambah Produk Baru</a>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <!-- Tabel Data Bootstrap -->
                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th>Nama Obat</th>
                                <th width="20%">Harga</th>
                                <th width="10%" class="text-center">Stok</th>
                                <th width="20%" class="text-center">Aksi (Pilihan)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- LOOPING DATA PRODUK -->
                            @foreach($list_produk as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td> <!-- $loop->iteration otomatis buat nomor urut -->
                                <td class="fw-bold">{{ $item->nama_produk }}</td>
                                <td class="text-primary fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge bg-success px-3 py-2">{{ $item->stok }}</span>
                                </td>
                                <td class="text-center">
                                    <!-- Tombol Edit & Hapus -->
                                    <a href="#" class="btn btn-warning btn-sm text-dark fw-bold">✏️ Edit</a>
                                    <button class="btn btn-danger btn-sm fw-bold">🗑️ Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                            
                            <!-- JIKA DATA KOSONG -->
                            @if($list_produk->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada produk yang ditambahkan.</td>
                            </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>