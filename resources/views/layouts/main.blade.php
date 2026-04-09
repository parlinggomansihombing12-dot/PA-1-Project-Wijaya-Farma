<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijaya Farma - @yield('title', 'Apotek Terpercaya')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS TEMA UTAMA -->
    <style>
        :root { 
            --tema-hijau: #1ABC9C; 
            --tema-tua: #16a085; 
        }
        
        body { 
            background-color: #f8fcfb; 
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            padding: 0; 
            overflow-x: hidden;
        }
        
        .navbar-custom { 
            background-color: var(--tema-hijau); 
            padding: 12px 0; 
            box-shadow: 0 4px 15px rgba(26,188,156,0.15); 
        }
        
        .navbar-brand { font-size: 1.4rem; letter-spacing: -0.5px; }
        
        .nav-link { 
            color: rgba(255,255,255,0.85) !important; 
            font-weight: 500; 
            margin: 0 5px; 
            transition: all 0.3s; 
            font-size: 0.95rem; 
        }
        
        .nav-link:hover { color: white !important; transform: translateY(-1px); }
        
        .nav-link.active { 
            color: white !important; 
            font-weight: 700; 
            border-bottom: 2px solid white; 
        }
        
        .btn-login { 
            background-color: white; 
            color: var(--tema-hijau) !important; 
            font-weight: 700; 
            border-radius: 50px; 
            padding: 8px 25px !important; 
            border: none; 
            transition: all 0.3s;
        }
        .btn-login:hover { background-color: #f1f3f5; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    </style>

    <!-- Panggilan CSS Anak -->
    @yield('custom-css')
    
</head>
<body>

<nav class="navbar navbar-expand-xl navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="/">
            <i class="fas fa-capsules me-2"></i>WIJAYA FARMA
        </a>
        
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="/kategori">Kategori</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('layanan*') ? 'active' : '' }}" href="/layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}" href="/artikel">Artikel</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('profil*') ? 'active' : '' }}" href="/profil">Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('testimoni*') ? 'active' : '' }}" href="/testimoni">Testimoni</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
                
                <li class="nav-item ms-lg-3 mt-3 mt-xl-0">
                    @auth 
                        <a href="/admin/dashboard" class="btn btn-login shadow-sm"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a>
                    @else 
                        <a href="/login" class="btn btn-login shadow-sm"><i class="fas fa-sign-in-alt me-1"></i> Login Admin</a> 
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="min-vh-100">
    @yield('content')
</main>

<footer class="bg-white py-4 mt-5 border-top">
    <div class="container text-center text-muted">
        <p class="mb-0">&copy; {{ date('Y') }} <b style="color: var(--tema-hijau);">Wijaya Farma</b>. Melayani Kesehatan Keluarga Anda Dengan Sepenuh Hati.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Panggilan JS Anak -->
@yield('custom-js')

</body>
</html>