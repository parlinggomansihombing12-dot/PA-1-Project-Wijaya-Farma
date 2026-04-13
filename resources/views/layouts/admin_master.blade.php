<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | Wijaya Farma</title>
    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #f4f6f9; overflow-x: hidden; }
        .sidebar { 
            background-color: #2C3E50; 
            min-height: 100vh; 
            color: white; 
            padding-top: 20px; 
            box-shadow: 2px 0 5px rgba(0,0,0,0.1); 
            position: sticky; 
            top: 0; 
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar::-webkit-scrollbar { width: 5px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: #1ABC9C; border-radius: 10px; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 14px 20px; display: block; font-weight: 500; transition: 0.3s; }
        .sidebar a i { width: 30px; text-align: center; font-size: 1.1rem; }
        .sidebar a:hover, .sidebar a.active { background-color: #1ABC9C; color: white; border-left: 5px solid #fff; }
        .content { padding: 30px; background-color: #f4f6f9; min-height: 100vh; }
        .btn-logout { margin-top: 20px; margin-bottom: 30px; }
        .brand-logo { letter-spacing: 1px; color: #1ABC9C; text-shadow: 0 2px 5px rgba(0,0,0,0.2); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center mb-5 mt-3 fw-bold brand-logo">
                <i class="fas fa-capsules me-2 text-white"></i>WIJAYA FARMA
            </h4>
            
            <a href="{{ route('dashboard') }}" class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
            
            <a href="{{ route('admin.produk.index') }}" class="{{ request()->is('admin/produk*') ? 'active' : '' }}">
                <i class="fas fa-box-open me-2"></i> Kelola Produk
            </a>
            
            <a href="{{ route('admin.kategori.index') }}" class="{{ request()->is('admin/kategori*') ? 'active' : '' }}">
                <i class="fas fa-tags me-2"></i> Kelola Kategori
            </a>
             
            <!-- FIX: Menggunakan admin.profil.index -->
            <a href="{{ route('admin.profil.index') }}" class="{{ request()->is('admin/profil-toko*') ? 'active' : '' }}">
               <i class="fas fa-notes-medical me-2"></i> Kelola Profil
            </a>
            
            <a href="{{ route('admin.layanan.index') }}" class="{{ request()->is('admin/layanan*') ? 'active' : '' }}">
                <i class="fas fa-notes-medical me-2"></i> Kelola Layanan
            </a>
            
            <a href="{{ route('admin.artikel.index') }}" class="{{ request()->is('admin/artikel*') ? 'active' : '' }}">
                <i class="fas fa-newspaper me-2"></i> Kelola Artikel
            </a>
            
            <a href="{{ route('admin.testimoni.index') }}" class="{{ request()->is('admin/testimoni*') ? 'active' : '' }}">
                <i class="fas fa-star me-2 text-warning"></i> Kelola Testimoni
            </a>
            
            <a href="{{ route('admin.kontak.index') }}" class="{{ request()->is('admin/kontak*') ? 'active' : '' }}">
                <i class="fas fa-address-book me-2"></i> Kelola Kontak
            </a>
            
            <hr class="text-secondary mx-3 mt-4 mb-4">
            
            <div class="px-3 btn-logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 shadow-sm rounded-pill fw-bold">
                        <i class="fas fa-sign-out-alt me-2"></i> KELUAR
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>