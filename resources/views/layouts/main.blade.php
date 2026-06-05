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

    <!-- CSS TEMA UTAMA & NAVBAR MODERN PREMIUM -->
    <style>
        :root { 
            --tema-hijau: #1ABC9C; 
            --tema-hijau-gelap: #0e8f74;
            --tema-hijau-muda: #7ef5d8;
            --teks-gelap: #1a202c;
            --teks-abu: #4a5568;
            --bg-putih: #ffffff;
            --gradien-utama: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%);
            --gradien-hover: linear-gradient(135deg, #16a085 0%, #1ABC9C 100%);
            --gradien-gold: linear-gradient(135deg, #f39c12, #e67e22);
            --shadow-sm: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-md: 0 8px 30px rgba(0,0,0,0.12);
            --shadow-lg: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        body { 
            background: linear-gradient(135deg, #f8fcfb 0%, #f0f7f5 100%);
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            padding: 0; 
            overflow-x: hidden;
        }
        
        /* ================= NAVBAR SUPER MODERN GLASSMORPHISM ================= */
        .navbar-custom { 
            background: rgba(26, 188, 156, 0.95);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            padding: 20px 0; 
            transition: all 0.3s ease;
            position: fixed;
            top: 0; 
            left: 0; 
            right: 0; 
            z-index: 1030;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 4px 30px rgba(0,0,0,0.05);
        }

        /* Saat layar di-scroll */
        .navbar-custom.scrolled {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            padding: 14px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            box-shadow: var(--shadow-md);
        }

        /* Logo Area Premium - DIPERBESAR */
        .navbar-brand { 
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .brand-icon {
            width: 55px;
            height: 55px;
            background: rgba(255,255,255,0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .brand-icon i {
            font-size: 1.8rem;
            color: white;
        }
        
        .navbar-custom.scrolled .brand-icon {
            background: rgba(26, 188, 156, 0.1);
        }
        
        .navbar-custom.scrolled .brand-icon i {
            color: var(--tema-hijau);
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
        }
        
        .brand-name {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f9f6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }
        
        .navbar-custom.scrolled .brand-name {
            background: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .brand-tagline {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.7);
            letter-spacing: 0.5px;
        }
        
        .navbar-custom.scrolled .brand-tagline {
            color: var(--teks-abu);
        }

        /* Menu Link Premium - DIPERBESAR */
        .nav-link { 
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255,255,255,0.95) !important; 
            font-weight: 700; 
            margin: 0 6px; 
            padding: 12px 24px !important;
            transition: all 0.2s ease; 
            font-size: 1.05rem; 
            position: relative;
            border-radius: 60px;
            letter-spacing: 0.3px;
            width: auto;
            min-width: fit-content;
        }
        
        .navbar-custom.scrolled .nav-link { 
            color: var(--teks-gelap) !important; 
        }
        
        /* Efek Hover & Active - TANPA PERUBAHAN UKURAN */
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 60px;
            opacity: 0;
            transition: opacity 0.2s ease;
            z-index: -1;
        }
        
        .navbar-custom.scrolled .nav-link::before {
            background: rgba(26, 188, 156, 0.12);
        }
        
        .nav-link:hover::before,
        .nav-link.active::before {
            opacity: 1;
        }
        
        .nav-link:hover, 
        .nav-link.active { 
            color: white !important; 
            transform: none;
        }
        
        .navbar-custom.scrolled .nav-link:hover,
        .navbar-custom.scrolled .nav-link.active { 
            color: var(--tema-hijau) !important; 
        }
        
        .nav-link i {
            font-size: 1.15rem;
            transition: transform 0.2s;
        }
        
        .nav-link:hover i {
            transform: translateY(-2px);
        }

        /* Tombol Login/Dashboard Premium - DIPERBESAR */
        .btn-login { 
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.95);
            color: var(--tema-hijau) !important; 
            font-weight: 800; 
            border-radius: 60px; 
            padding: 12px 32px !important; 
            border: none; 
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            font-size: 1rem;
            letter-spacing: 0.5px;
            width: auto;
            white-space: nowrap;
        }
        
        .btn-login i {
            font-size: 1rem;
        }
        
        .btn-login:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 8px 25px rgba(26, 188, 156, 0.3);
            background: white;
        }
        
        /* Tombol Berubah Saat Navbar di-scroll */
        .navbar-custom.scrolled .btn-login { 
            background: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%);
            color: white !important;
            box-shadow: var(--shadow-sm);
        }
        
        .navbar-custom.scrolled .btn-login:hover {
            background: linear-gradient(135deg, #16a085 0%, #0e8f74 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Tombol Toggler Mobile */
        .navbar-toggler {
            border: none;
            padding: 10px 14px;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.2);
            border-radius: 14px;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }
        
        .navbar-toggler-icon {
            width: 26px;
            height: 2px;
            background: white;
            display: block;
            position: relative;
        }
        
        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            width: 26px;
            height: 2px;
            background: white;
            position: absolute;
            transition: all 0.3s;
        }
        
        .navbar-toggler-icon::before {
            top: -9px;
        }
        
        .navbar-toggler-icon::after {
            bottom: -9px;
        }
        
        .navbar-custom.scrolled .navbar-toggler-icon,
        .navbar-custom.scrolled .navbar-toggler-icon::before,
        .navbar-custom.scrolled .navbar-toggler-icon::after {
            background: var(--tema-hijau);
        }
        
        /* Dropdown menu mobile */
        @media (max-width: 1200px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 24px;
                padding: 25px;
                margin-top: 15px;
                box-shadow: var(--shadow-lg);
            }
            
            .nav-link {
                justify-content: center;
                padding: 14px 24px !important;
                border-radius: 16px;
                margin: 6px 0;
                font-size: 1rem;
            }
            
            .btn-login {
                margin-top: 15px;
                justify-content: center;
                width: 100%;
            }
            
            .brand-name {
                font-size: 1.2rem;
            }
            
            .brand-icon {
                width: 45px;
                height: 45px;
            }
            
            .brand-icon i {
                font-size: 1.5rem;
            }
        }
        
        /* Mendorong Konten Utama ke Bawah */
        main { 
            padding-top: 95px;
        }
        
        /* Scroll indicator */
        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, #1ABC9C, #f39c12);
            z-index: 1031;
            transition: width 0.3s ease;
        }
    </style>

    @yield('custom-css')
    
</head>
<body>

<!-- Scroll Progress Indicator -->
<div class="scroll-indicator" id="scrollIndicator"></div>

<nav class="navbar navbar-expand-xl navbar-custom" id="mainNavbar">
    <div class="container">
        <!-- Logo Apotek Premium - DIPERBESAR -->
        <a class="navbar-brand" href="/">
            <div class="brand-icon">
                <i class="fas fa-capsules"></i>
            </div>
            <div class="brand-text">
                <span class="brand-name">WIJAYA FARMA</span>
                <span class="brand-tagline">Apotek & Kesehatan</span>
            </div>
        </a>
        
        <!-- Tombol Menu HP -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Daftar Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Beranda -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                
                <!-- Produk -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="/produk">
                        <i class="fas fa-pills"></i> Produk
                    </a>
                </li>
                
                <!-- Kategori -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="/kategori">
                        <i class="fas fa-tags"></i> Kategori
                    </a>
                </li>
                
                <!-- Layanan -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('layanan*') ? 'active' : '' }}" href="/layanan">
                        <i class="fas fa-concierge-bell"></i> Layanan
                    </a>
                </li>
                
                <!-- Artikel -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}" href="/artikel">
                        <i class="fas fa-newspaper"></i> Artikel
                    </a>
                </li>
                
                <!-- Profil -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profil*') ? 'active' : '' }}" href="/profil">
                        <i class="fas fa-building"></i> Profil
                    </a>
                </li>
                
                <!-- Testimoni -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('testimoni*') ? 'active' : '' }}" href="/testimoni">
                        <i class="fas fa-star"></i> Testimoni
                    </a>
                </li>
                
                <!-- Kontak -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="/kontak">
                        <i class="fas fa-envelope"></i> Kontak
                    </a>
                </li>
                
                <!-- Tombol Login Premium -->
                <li class="nav-item ms-xl-2 mt-3 mt-xl-0">
                    @auth 
                        <a href="/admin/dashboard" class="btn-login">
                            <i class="fas fa-tachometer-alt"></i> Dashboard Admin
                        </a>
                    @else 
                        <a href="/login" class="btn-login">
                            <i class="fas fa-sign-in-alt"></i> Login Admin
                        </a> 
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- KONTEN UTAMA -->
<main class="min-vh-100">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-white py-5 mt-5 border-top">
    <div class="container text-center">
        <div class="mb-4">
            <div class="d-inline-flex align-items-center justify-content-center" style="width: 75px; height: 75px; background: linear-gradient(135deg, #1ABC9C15, #16a08515); border-radius: 20px;">
                <i class="fas fa-capsules fs-1" style="color: var(--tema-hijau);"></i>
            </div>
        </div>
        <h4 class="fw-bold mb-3" style="background: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%); -webkit-background-clip: text; background-clip: text; color: transparent;">
            WIJAYA FARMA
        </h4>
        <p class="mb-4 text-muted" style="max-width: 500px; margin: 0 auto;">Melayani Kesehatan Keluarga Anda Dengan Sepenuh Hati dan Teknologi Modern.</p>
        <div class="d-flex justify-content-center gap-4 mb-4">
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-facebook-f fa-lg"></i></a>
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-whatsapp fa-lg"></i></a>
        </div>
        <p class="small mb-0 opacity-75">&copy; {{ date('Y') }} <b>Apotek Wijaya Farma</b>. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        const nav = document.getElementById('mainNavbar');
        const scrollIndicator = document.getElementById('scrollIndicator');
        
        function updateNavbar() {
            const scrollY = window.scrollY;
            
            if (scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
            
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            scrollIndicator.style.width = scrolled + '%';
        }
        
        window.addEventListener('scroll', updateNavbar);
        updateNavbar();
    });
</script>

@yield('custom-js')

</body>
</html>