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
        
        /* ================= NAVBAR PREMIUM GLASSMORPHISM ================= */
        .navbar-custom { 
            background: rgba(26, 188, 156, 0.92);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            padding: 18px 0; 
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: fixed;
            top: 0; 
            left: 0; 
            right: 0; 
            z-index: 1030;
            border-bottom: 1px solid rgba(255,255,255,0.25);
            box-shadow: 0 4px 30px rgba(0,0,0,0.05);
        }

        /* Saat layar di-scroll - Premium Style */
        .navbar-custom.scrolled {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            padding: 12px 0;
            border-bottom: 1px solid rgba(0,0,0,0.08);
            box-shadow: var(--shadow-md);
        }

        /* Logo Area Premium */
        .navbar-brand { 
            font-size: 1.6rem; 
            letter-spacing: -0.5px; 
            transition: all 0.4s ease;
            background: linear-gradient(135deg, #ffffff 0%, #f0f9f6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            font-weight: 800;
            position: relative;
        }
        
        .navbar-custom.scrolled .navbar-brand {
            background: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
        }

        .navbar-brand i {
            background: linear-gradient(135deg, #fff 0%, #e0f2ef 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 1.8rem;
            margin-right: 10px;
        }

        .navbar-custom.scrolled .navbar-brand i {
            background: linear-gradient(135deg, #1ABC9C 0%, #0e8f74 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Menu Link Premium */
        .nav-link { 
            color: rgba(255,255,255,0.92) !important; 
            font-weight: 600; 
            margin: 0 6px; 
            padding: 10px 16px !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
            font-size: 0.95rem; 
            position: relative;
            border-radius: 50px;
            letter-spacing: 0.3px;
        }
        
        .navbar-custom.scrolled .nav-link { 
            color: var(--teks-gelap) !important; 
            opacity: 0.85;
        }
        
        /* Efek Hover Premium - Background Mengambang */
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.15);
            border-radius: 50px;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: -1;
        }
        
        .navbar-custom.scrolled .nav-link::before {
            background: rgba(26, 188, 156, 0.1);
        }
        
        .nav-link:hover::before,
        .nav-link.active::before {
            transform: scale(1);
            opacity: 1;
        }
        
        .nav-link:hover, 
        .nav-link.active { 
            color: white !important; 
            transform: translateY(-2px);
        }
        
        .navbar-custom.scrolled .nav-link:hover,
        .navbar-custom.scrolled .nav-link.active { 
            color: var(--tema-hijau) !important; 
            opacity: 1;
        }
        
        /* Garis bawah animasi tambahan */
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #fff, #7ef5d8);
            border-radius: 10px;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .navbar-custom.scrolled .nav-link::after {
            background: linear-gradient(90deg, #1ABC9C, #0e8f74);
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 70%;
        }

        /* Tombol Login/Dashboard Premium */
        .btn-login { 
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.85) 100%);
            color: var(--tema-hijau) !important; 
            font-weight: 700; 
            border-radius: 50px; 
            padding: 10px 28px !important; 
            border: none; 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s ease;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        .btn-login:hover { 
            transform: translateY(-3px) scale(1.02); 
            box-shadow: 0 8px 25px rgba(26, 188, 156, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(0px);
        }
        
        /* Tombol Berubah Saat Navbar di-scroll */
        .navbar-custom.scrolled .btn-login { 
            background: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%);
            color: white !important;
            box-shadow: var(--shadow-sm);
        }
        
        .navbar-custom.scrolled .btn-login:hover {
            background: linear-gradient(135deg, #16a085 0%, #0e8f74 100%);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Tombol Toggler Mobile Premium */
        .navbar-toggler {
            border: none;
            padding: 8px 12px;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
        }
        
        .navbar-custom.scrolled .navbar-toggler {
            background: rgba(26, 188, 156, 0.1);
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }
        
        .navbar-toggler-icon-custom {
            width: 28px;
            height: 2px;
            background: white;
            display: block;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .navbar-toggler-icon-custom::before,
        .navbar-toggler-icon-custom::after {
            content: '';
            width: 28px;
            height: 2px;
            background: white;
            position: absolute;
            transition: all 0.3s ease;
        }
        
        .navbar-toggler-icon-custom::before {
            top: -8px;
        }
        
        .navbar-toggler-icon-custom::after {
            bottom: -8px;
        }
        
        .navbar-custom.scrolled .navbar-toggler-icon-custom,
        .navbar-custom.scrolled .navbar-toggler-icon-custom::before,
        .navbar-custom.scrolled .navbar-toggler-icon-custom::after {
            background: var(--tema-hijau);
        }
        
        /* Dropdown menu mobile premium */
        @media (max-width: 1200px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 20px;
                padding: 20px;
                margin-top: 15px;
                box-shadow: var(--shadow-lg);
            }
            
            .navbar-custom.scrolled .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
            }
            
            .nav-link {
                color: var(--teks-gelap) !important;
                padding: 12px 20px !important;
                border-radius: 12px;
                margin: 4px 0;
            }
            
            .nav-link::before {
                background: rgba(26, 188, 156, 0.08);
            }
            
            .nav-link:hover,
            .nav-link.active {
                color: var(--tema-hijau) !important;
                background: rgba(26, 188, 156, 0.08);
                transform: translateX(5px);
            }
            
            .btn-login {
                margin-top: 10px;
                display: inline-block;
                text-align: center;
            }
        }
        
        /* Mendorong Konten Utama ke Bawah */
        main { 
            padding-top: 90px;
        }
        
        /* Efek scroll indicator */
        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #1ABC9C, #7ef5d8);
            z-index: 1031;
            transition: width 0.3s ease;
            box-shadow: 0 0 10px rgba(26,188,156,0.5);
        }
        
        /* Animasi fade in untuk konten */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <!-- Panggilan CSS Khusus Anak -->
    @yield('custom-css')
    
</head>
<body>

<!-- Scroll Progress Indicator -->
<div class="scroll-indicator" id="scrollIndicator"></div>

<nav class="navbar navbar-expand-xl navbar-custom" id="mainNavbar">
    <div class="container">
        <!-- Logo Apotek Premium -->
        <a class="navbar-brand fw-bold" href="/">
            <i class="fas fa-capsules me-2"></i>WIJAYA FARMA
        </a>
        
        <!-- Tombol Menu HP Premium -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <div class="navbar-toggler-icon-custom"></div>
        </button>
        
        <!-- Daftar Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/"><i class="fas fa-home me-2"></i>Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="/produk"><i class="fas fa-pills me-2"></i>Produk</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="/kategori"><i class="fas fa-tags me-2"></i>Kategori</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('layanan*') ? 'active' : '' }}" href="/layanan"><i class="fas fa-concierge-bell me-2"></i>Layanan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}" href="/artikel"><i class="fas fa-newspaper me-2"></i>Artikel</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('profil*') ? 'active' : '' }}" href="/profil"><i class="fas fa-building me-2"></i>Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('testimoni*') ? 'active' : '' }}" href="/testimoni"><i class="fas fa-star me-2"></i>Testimoni</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="/kontak"><i class="fas fa-envelope me-2"></i>Kontak</a></li>
                
                <!-- Pemisah Tombol Login Premium -->
                <li class="nav-item ms-lg-4 mt-3 mt-xl-0">
                    @auth 
                        <a href="/admin/dashboard" class="btn btn-login"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                    @else 
                        <a href="/login" class="btn btn-login"><i class="fas fa-sign-in-alt me-2"></i> Login Admin</a> 
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

<!-- FOOTER BERSAMA PREMIUM -->
<footer class="bg-white py-5 mt-5 border-top" style="background: linear-gradient(135deg, #ffffff 0%, #f8fcfb 100%) !important;">
    <div class="container text-center">
        <div class="mb-4">
            <i class="fas fa-capsules fs-1" style="color: var(--tema-hijau); opacity: 0.8;"></i>
        </div>
        <h4 class="fw-bold mb-3" style="background: linear-gradient(135deg, #1ABC9C 0%, #16a085 100%); -webkit-background-clip: text; background-clip: text; color: transparent;">
            WIJAYA FARMA
        </h4>
        <p class="mb-4 text-muted" style="max-width: 500px; margin: 0 auto;">Melayani Kesehatan Keluarga Anda Dengan Sepenuh Hati dan Teknologi Modern.</p>
        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-decoration-none" style="color: var(--tema-hijau);"><i class="fab fa-whatsapp"></i></a>
        </div>
        <p class="small mb-0 opacity-75">&copy; {{ date('Y') }} <b>Apotek Wijaya Farma</b>. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JAVASCRIPT PREMIUM UNTUK EFEK NAVBAR SCROLL & PROGRESS INDICATOR -->
<script>
    document.addEventListener("DOMContentLoaded", function(){
        // Navbar scroll effect
        const nav = document.getElementById('mainNavbar');
        const scrollIndicator = document.getElementById('scrollIndicator');
        
        function updateNavbar() {
            const scrollY = window.scrollY;
            
            if (scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
            
            // Update scroll indicator
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            scrollIndicator.style.width = scrolled + '%';
        }
        
        window.addEventListener('scroll', updateNavbar);
        updateNavbar();
        
        // Smooth scroll untuk link internal (opsional)
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Efek hover tambahan untuk tombol toggler
        const toggler = document.querySelector('.navbar-toggler');
        if (toggler) {
            toggler.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            toggler.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        }
    });
</script>

<!-- Panggilan JS Anak -->
@yield('custom-js')

</body>
</html>