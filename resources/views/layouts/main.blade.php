<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Wijaya Farma - @yield('title', 'Apotek Terpercaya')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root { 
            --tema-hijau: #1ABC9C; 
            --tema-hijau-gelap: #16a085;
            --teks-gelap: #1a202c;
            --teks-abu: #4a5568;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            background: linear-gradient(135deg, #f8fcfb 0%, #f0f7f5 100%);
            font-family: 'Inter', sans-serif; 
            overflow-x: hidden;
        }
        
        /* ================= NAVBAR - LEBIH KECIL & RAPI ================= */
        .navbar-custom { 
            background: rgba(26, 188, 156, 0.95);
            backdrop-filter: blur(10px);
            padding: 12px 0; 
            transition: all 0.3s ease;
            position: fixed;
            top: 0; 
            left: 0; 
            right: 0; 
            z-index: 1030;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .navbar-custom.scrolled {
            background: rgba(255, 255, 255, 0.98);
            padding: 8px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        /* Logo - LEBIH KECIL */
        .navbar-brand { 
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        
        .brand-icon {
            width: 38px;
            height: 38px;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .brand-icon i {
            font-size: 1.3rem;
            color: white;
        }
        
        .navbar-custom.scrolled .brand-icon {
            background: rgba(26, 188, 156, 0.1);
        }
        
        .navbar-custom.scrolled .brand-icon i {
            color: var(--tema-hijau);
        }
        
        .brand-name {
            font-size: 1.1rem;
            font-weight: 800;
            color: white;
        }
        
        .navbar-custom.scrolled .brand-name {
            color: var(--tema-hijau);
        }
        
        .brand-tagline {
            font-size: 0.55rem;
            color: rgba(255,255,255,0.7);
        }
        
        .navbar-custom.scrolled .brand-tagline {
            color: var(--teks-abu);
        }

        /* Menu Link - LEBIH KECIL */
        .nav-link { 
            display: flex;
            align-items: center;
            gap: 6px;
            color: rgba(255,255,255,0.9) !important; 
            font-weight: 600; 
            margin: 0 2px; 
            padding: 8px 14px !important;
            font-size: 0.85rem; 
            border-radius: 40px;
        }
        
        .navbar-custom.scrolled .nav-link { 
            color: var(--teks-gelap) !important; 
        }
        
        .nav-link:hover, 
        .nav-link.active { 
            background: rgba(255,255,255,0.15);
            color: white !important; 
        }
        
        .navbar-custom.scrolled .nav-link:hover,
        .navbar-custom.scrolled .nav-link.active { 
            background: rgba(26, 188, 156, 0.1);
            color: var(--tema-hijau) !important; 
        }
        
        .nav-link i {
            font-size: 0.8rem;
        }

        /* Tombol Login - LEBIH KECIL */
        .btn-login { 
            display: flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.9);
            color: var(--tema-hijau) !important; 
            font-weight: 700; 
            border-radius: 40px; 
            padding: 8px 20px !important; 
            font-size: 0.8rem;
            transition: all 0.3s;
        }
        
        .navbar-custom.scrolled .btn-login { 
            background: linear-gradient(135deg, #1ABC9C, #16a085);
            color: white !important;
        }
        
        /* Toggler */
        .navbar-toggler {
            border: none;
            background: rgba(255,255,255,0.2);
            padding: 6px 10px;
            border-radius: 10px;
        }
        
        .navbar-toggler-icon {
            width: 22px;
            height: 2px;
            background: white;
            display: block;
            position: relative;
        }
        
        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            width: 22px;
            height: 2px;
            background: white;
            position: absolute;
        }
        
        .navbar-toggler-icon::before { top: -7px; }
        .navbar-toggler-icon::after { bottom: -7px; }
        
        /* Mobile menu */
        @media (max-width: 1200px) {
            .navbar-collapse {
                background: white;
                border-radius: 16px;
                padding: 15px;
                margin-top: 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            }
            .nav-link {
                color: var(--teks-gelap) !important;
                padding: 10px 15px !important;
            }
            .btn-login {
                margin-top: 10px;
                justify-content: center;
            }
        }
        
        main { 
            padding-top: 75px;
        }
        
        /* Scroll indicator */
        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #1ABC9C, #e67e22);
            z-index: 1031;
        }
    </style>

    @yield('custom-css')
    
</head>
<body>

<div class="scroll-indicator" id="scrollIndicator"></div>

<nav class="navbar navbar-expand-xl navbar-custom" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <div class="brand-icon">
                <i class="fas fa-capsules"></i>
            </div>
            <div>
                <div class="brand-name">WIJAYA FARMA</div>
                <div class="brand-tagline">Apotek & Kesehatan</div>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/"><i class="fas fa-home"></i> Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="/produk"><i class="fas fa-pills"></i> Produk</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="/kategori"><i class="fas fa-tags"></i> Kategori</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('layanan*') ? 'active' : '' }}" href="/layanan"><i class="fas fa-concierge-bell"></i> Layanan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}" href="/artikel"><i class="fas fa-newspaper"></i> Artikel</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('profil*') ? 'active' : '' }}" href="/profil"><i class="fas fa-building"></i> Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('testimoni*') ? 'active' : '' }}" href="/testimoni"><i class="fas fa-star"></i> Testimoni</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="/kontak"><i class="fas fa-envelope"></i> Kontak</a></li>
                
                <li class="nav-item ms-xl-2 mt-2 mt-xl-0">
                    @auth 
                        <a href="/admin/dashboard" class="btn-login"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    @else 
                        <a href="/login" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</a> 
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="bg-white py-4 mt-4 border-top">
    <div class="container text-center">
        <div class="mb-3">
            <i class="fas fa-capsules fs-2" style="color: var(--tema-hijau); opacity: 0.7;"></i>
        </div>
        <p class="small mb-0 text-muted">&copy; {{ date('Y') }} <b>Wijaya Farma</b>. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        const nav = document.getElementById('mainNavbar');
        const scrollIndicator = document.getElementById('scrollIndicator');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
            
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            scrollIndicator.style.width = scrolled + '%';
        });
    });
</script>

@yield('custom-js')

</body>
</html>