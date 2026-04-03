<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- TAMBAHKAN FONTAWESOME AGAR IKON MUNCUL SEMUA -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #f4f6f9; overflow-x: hidden; }
        .sidebar { background-color: #2C3E50; min-height: 100vh; color: white; padding-top: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1); position: sticky; top: 0; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 12px 20px; display: block; font-weight: 500; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: #1ABC9C; color: white; border-left: 4px solid #fff; }
        .content { padding: 30px; background-color: #f4f6f9; min-height: 100vh; }
        .btn-logout { margin-top: 20px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center mb-4 text-white fw-bold mt-3">💊 Wijaya Farma</h4>
            <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
            <a href="/admin/produk" class="{{ request()->is('admin/produk') ? 'active' : '' }}">📦 Produk</a>
            <a href="/admin/kategori" class="{{ request()->is('admin/kategori') ? 'active' : '' }}">📂 Kategori</a>
            <a href="/admin/layanan" class="{{ request()->is('admin/layanan*') ? 'active' : '' }}">⚕️ Layanan</a>
            <a href="/admin/artikel" class="{{ request()->is('admin/artikel') ? 'active' : '' }}">📝 Artikel</a>
            <a href="/admin/testimoni" class="{{ request()->is('admin/testimoni') ? 'active' : '' }}">⭐ Testimoni</a>
            <a href="/admin/profil-toko" class="{{ request()->is('admin/profil-toko') ? 'active' : '' }}">⚙️ Profil Toko</a>
            
            <hr class="text-secondary mx-3">
            <div class="px-3 btn-logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 shadow-sm">
                        <i class="fas fa-sign-out-alt me-1"></i> Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- KONTEN -->
        <div class="col-md-10 content">
            @yield('content')
        </div>
    </div>
</div>

<!-- ========================================================== -->
<!-- WAJIB: SCRIPT INI YANG MENJALANKAN MODAL (JANGAN DIHAPUS) -->
<!-- ========================================================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>