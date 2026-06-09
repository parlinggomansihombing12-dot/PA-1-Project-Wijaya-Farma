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
        :root {
            --primary: #1ABC9C;
            --primary-dark: #16a085;
            --primary-light: #d1fae5;
            --secondary: #2c3e50;
            --dark: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            background-color: #f8fafc; 
            overflow-x: hidden; 
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }
        
        /* ================= SIDEBAR ================= */
        .sidebar { 
            background: linear-gradient(185deg, #1e293b 0%, #0f172a 100%); 
            min-height: 100vh; 
            color: #cbd5e1; 
            padding-top: 15px; 
            box-shadow: 2px 0 15px rgba(0,0,0,0.05); 
            position: fixed;
            top: 0; 
            left: 0;
            width: 220px;
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }
        
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        
        /* Brand Logo */
        .brand-logo { 
            padding: 0 12px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .brand-logo a {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .brand-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .brand-icon i {
            font-size: 1rem;
            color: white;
        }
        
        .brand-text {
            font-size: 0.85rem;
            font-weight: 800;
            color: white;
            letter-spacing: 0.5px;
        }
        
        /* Menu Sidebar */
        .sidebar-menu {
            flex: 1;
            padding: 0 10px;
        }
        
        .menu-header {
            font-size: 0.55rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            font-weight: 700;
            margin: 15px 0 5px 8px;
        }
        
        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 8px 10px;
            margin: 2px 0;
            color: #94a3b8;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.75rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            gap: 10px;
        }
        
        .sidebar-item i {
            width: 20px;
            font-size: 0.85rem;
            text-align: center;
        }
        
        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            transform: translateX(3px);
        }
        
        .sidebar-item.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 2px 8px rgba(26,188,156,0.25);
        }
        
        .sidebar-item.active i {
            color: white;
        }
        
        /* ================= NAVBAR ATAS ================= */
        .navbar-top {
            background: white;
            padding: 12px 20px;
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid #eef2f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 220px;
            width: calc(100% - 220px);
            position: fixed;
            top: 0;
            right: 0;
            z-index: 999;
        }
        
        .navbar-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }
        
        /* Tombol Logout di Navbar */
        .btn-logout-nav {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 0.75rem;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            text-decoration: none;
        }
        
        .btn-logout-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            gap: 10px;
            color: white;
        }
        
        /* ================= MAIN CONTENT ================= */
        .main-content {
            margin-left: 220px;
            margin-top: 70px;
            padding: 15px;
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            width: calc(100% - 220px);
        }
        
        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                padding: 0;
                overflow: hidden;
            }
            .navbar-top {
                margin-left: 0;
                width: 100%;
            }
            .main-content {
                margin-left: 0;
                margin-top: 70px;
                width: 100%;
            }
        }
    </style>

    <!-- CSS KUSTOM DARI CHILD VIEW -->
    @yield('custom-css')

</head>
<body>

<!-- NAVBAR ATAS DENGAN TOMBOL LOGOUT -->
<div class="navbar-top">
    <h5 class="navbar-title">
        <i class="fas fa-capsules me-2" style="color: var(--primary);"></i> 
        Panel Administrator
    </h5>
    
    <form method="POST" action="{{ route('logout') }}" class="m-0">
        @csrf
        <button type="submit" class="btn-logout-nav">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>

<!-- SIDEBAR (TANPA TOMBOL LOGOUT) -->
<div class="sidebar">
    <div>
        <!-- Brand Logo -->
        <div class="brand-logo">
            <a href="/admin/dashboard">
                <div class="brand-icon">
                    <i class="fas fa-capsules"></i>
                </div>
                <div class="brand-text">ADMIN</div>
            </a>
        </div>
        
        <!-- MENU SIDEBAR -->
        <div class="sidebar-menu">
            
            <div class="menu-header">Utama</div>
            
            <a href="/admin/dashboard" class="sidebar-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            
            <div class="menu-header">Manajemen</div>
            
            <a href="/admin/produk" class="sidebar-item {{ request()->is('admin/produk*') ? 'active' : '' }}">
                <i class="fas fa-box-open"></i>
                <span>Produk</span>
            </a>
            
            <a href="/admin/kategori" class="sidebar-item {{ request()->is('admin/kategori*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i>
                <span>Kategori</span>
            </a>
             
            <div class="menu-header">Konten</div>

            <a href="/admin/profil-toko" class="sidebar-item {{ request()->is('admin/profil-toko*') ? 'active' : '' }}">
                <i class="fas fa-store-alt"></i>
                <span>Profil Toko</span>
            </a>
            
            <a href="/admin/layanan" class="sidebar-item {{ request()->is('admin/layanan*') ? 'active' : '' }}">
                <i class="fas fa-notes-medical"></i>
                <span>Layanan</span>
            </a>
            
            <a href="/admin/artikel" class="sidebar-item {{ request()->is('admin/artikel*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>
                <span>Artikel</span>
            </a>
            
            <a href="/admin/testimoni" class="sidebar-item {{ request()->is('admin/testimoni*') ? 'active' : '' }}">
                <i class="fas fa-star"></i>
                <span>Testimoni</span>
            </a>
            
            <a href="/admin/kontak" class="sidebar-item {{ request()->is('admin/kontak*') ? 'active' : '' }}">
                <i class="fas fa-address-book"></i>
                <span>Kontak</span>
            </a>
        </div>
    </div>
    
    <!-- FOOTER SIDEBAR (KOSONG - TANPA LOGOUT) -->
    <div class="sidebar-footer" style="padding: 15px 12px 20px;">
        <!-- Tombol Logout sudah dipindahkan ke navbar atas -->
    </div>
</div>

<!-- KONTEN UTAMA -->
<div class="main-content">
    @yield('content')
</div>

<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JAVASCRIPT KUSTOM DARI CHILD VIEW -->
@yield('custom-js')

</body>
</html>