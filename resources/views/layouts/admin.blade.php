<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
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
        <!-- SIDEBAR PINTAR (HANYA DITULIS 1 KALI DI SINI) -->
        <div class="col-md-2 sidebar p-0">
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
                    <button type="submit" class="btn btn-danger w-100">Keluar (Logout)</button>
                </form>
            </div>
        </div>

        <!-- KONTEN ADMIN AKAN DISUNTIKKAN DI SINI -->
        <div class="col-md-10 content">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>