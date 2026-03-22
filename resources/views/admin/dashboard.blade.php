<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Apotek Wijaya Farma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { 
            background-color: #2C3E50; 
            min-height: 100vh; 
            color: white; 
            padding-top: 20px; 
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
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
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- SIDEBAR (MENU KIRI) -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center mb-4 text-white fw-bold mt-3">💊 Admin Panel</h4>
            
            <a href="/admin/dashboard" class="active">🏠 Dashboard</a>
            <a href="/admin/produk">📦 Kelola Produk</a>
            <a href="/admin/kategori">📂 Kelola Kategori</a>
            <a href="/admin/layanan">⚕️ Kelola Layanan</a>
            <a href="/admin/artikel">📝 Kelola Artikel</a>
            <a href="/admin/testimoni">⭐ Kelola Testimoni</a>
            <a href="/admin/profil">⚙️ Profil Toko</a>
            
            <hr class="text-secondary mx-3">
            
            <!-- Tombol Logout -->
            <div class="px-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Keluar (Logout)</button>
                </form>
            </div>
        </div>

        <!-- KONTEN UTAMA (KANAN) -->
        <div class="col-md-10 content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold" style="color: #2C3E50;">Dashboard Statistik</h2>
                <!-- Menampilkan nama admin yang sedang login -->
                <p class="mb-0">Halo, <strong class="text-success">{{ Auth::user()->name }}</strong>!</p>
            </div>

            <!-- KARTU STATISTIK -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm border-0 text-white h-100" style="background-color: #2980B9;">
                        <div class="card-body">
                            <h6 class="text-uppercase fw-bold">Total Produk</h6>
                            <h1 class="display-4 fw-bold mb-0">15</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm border-0 text-white h-100" style="background-color: #1ABC9C;">
                        <div class="card-body">
                            <h6 class="text-uppercase fw-bold">Total Kategori</h6>
                            <h1 class="display-4 fw-bold mb-0">5</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm border-0 text-white h-100" style="background-color: #f39c12;">
                        <div class="card-body">
                            <h6 class="text-uppercase fw-bold">Pesan Baru</h6>
                            <h1 class="display-4 fw-bold mb-0">3</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PESAN SELAMAT DATANG -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="fw-bold">Selamat Datang di Ruang Kendali!</h5>
                    <p class="text-muted mb-0">
                        Di halaman ini Anda dapat mengelola seluruh isi website Apotek Wijaya Farma. Silakan gunakan menu navigasi di sebelah kiri untuk menambah, mengubah, atau menghapus data.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>