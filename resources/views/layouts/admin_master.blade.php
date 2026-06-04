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
        body { 
            background-color: #f8fafc; 
            overflow-x: hidden; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Premium Modern Sidebar */
        .sidebar { 
            background: linear-gradient(185deg, #1e293b 0%, #0f172a 100%); 
            min-height: 100vh; 
            color: #cbd5e1; 
            padding-top: 30px; 
            box-shadow: 5px 0 25px rgba(15, 23, 42, 0.15); 
            position: sticky; 
            top: 0; 
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        
        /* Brand Styling */
        .brand-logo { 
            letter-spacing: 2px; 
            color: #ffffff; 
            font-size: 1.45rem;
            padding: 0 24px;
            text-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }
        .brand-logo i {
            background: linear-gradient(135deg, #0ea5e9, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.7rem;
        }

        /* Menu Container */
        .sidebar-menu {
            padding: 0 16px;
            margin-bottom: auto;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        /* Menu Category Header */
        .menu-header {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #64748b;
            font-weight: 700;
            margin-top: 20px;
            margin-bottom: 5px;
            padding-left: 16px;
        }
        
        /* Nav Links */
        .sidebar a { 
            color: #94a3b8; 
            text-decoration: none; 
            padding: 15px 20px;
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 1.05rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        
        .sidebar a i { 
            width: 32px; 
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }
        
        /* Hover State */
        .sidebar a:hover { 
            background-color: rgba(255, 255, 255, 0.05); 
            color: #ffffff; 
            transform: translateX(4px);
        }
        .sidebar a:hover i {
            transform: scale(1.15);
        }
        
        /* Active State */
        .sidebar a.active { 
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%); 
            color: #ffffff; 
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.35);
        }
        .sidebar a.active i {
            color: #ffffff !important;
        }
        
        /* Footer/Logout Area */
        .sidebar-footer {
            padding: 25px 20px 35px 20px;
            background: linear-gradient(360deg, rgba(15, 23, 42, 0.5) 0%, transparent 100%);
        }
        .btn-logout-custom {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.15) 0%, rgba(220, 38, 38, 0.05) 100%);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.25);
            padding: 15px;
            border-radius: 12px;
            width: 100%;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-logout-custom:hover {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #ffffff;
            border-color: transparent;
            box-shadow: 0 10px 20px rgba(239, 68, 68, 0.3);
            transform: translateY(-2px);
        }

        .content { 
            padding: 40px; 
            background-color: #f8fafc; 
            min-height: 100vh; 
        }
    </style>

    <!-- CSS KUSTOM DARI CHILD VIEW -->
    @yield('custom-css')

</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-0">
            <div>
                <!-- Brand Logo -->
                <h4 class="text-center mb-4 mt-3 fw-bold brand-logo d-flex align-items-center justify-content-center">
                    <i class="fas fa-capsules me-2"></i>WIJAYA FARMA
                </h4>
                
                <!-- MENU SIDEBAR -->
                <div class="sidebar-menu">
                    
                    <div class="menu-header">Utama</div>
                    
                    <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="fas fa-home me-2"></i> Dashboard
                    </a>
                    
                    <div class="menu-header">Manajemen Produk</div>
                    
                    <a href="/admin/produk" class="{{ request()->is('admin/produk*') ? 'active' : '' }}">
                        <i class="fas fa-box-open me-2"></i> Kelola Produk
                    </a>
                    
                    <a href="/admin/kategori" class="{{ request()->is('admin/kategori*') ? 'active' : '' }}">
                        <i class="fas fa-tags me-2"></i> Kelola Kategori
                    </a>
                     
                    <div class="menu-header">Informasi & Layanan</div>

                    <a href="/admin/profil-toko" class="{{ request()->is('admin/profil-toko*') ? 'active' : '' }}">
                       <i class="fas fa-store-alt me-2"></i> Profil Toko
                    </a>
                    
                    <a href="/admin/layanan" class="{{ request()->is('admin/layanan*') ? 'active' : '' }}">
                        <i class="fas fa-notes-medical me-2"></i> Kelola Layanan
                    </a>
                    
                    <a href="/admin/artikel" class="{{ request()->is('admin/artikel*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper me-2"></i> Kelola Artikel
                    </a>
                    
                    <a href="/admin/testimoni" class="{{ request()->is('admin/testimoni*') ? 'active' : '' }}">
                        <i class="fas fa-star me-2"></i> Kelola Testimoni
                    </a>
                    
                    <a href="/admin/kontak" class="{{ request()->is('admin/kontak*') ? 'active' : '' }}">
                        <i class="fas fa-address-book me-2"></i> Kelola Kontak
                    </a>
                </div>
            </div>
            
            <!-- FOOTER SIDEBAR (LOGOUT) -->
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-logout-custom">
                        <i class="fas fa-sign-out-alt me-2"></i> KELUAR
                    </button>
                </form>
            </div>
        </div>

        <!-- KONTEN UTAMA -->
        <div class="col-md-10 content">
            @yield('content')
        </div>
        
    </div>
</div>

<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JAVASCRIPT KUSTOM DARI CHILD VIEW -->
@yield('custom-js')

</body>
</html>