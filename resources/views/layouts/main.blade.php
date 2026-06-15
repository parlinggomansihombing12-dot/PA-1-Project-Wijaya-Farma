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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            background: linear-gradient(135deg, #f8fcfb 0%, #f0f7f5 100%);
            font-family: 'Inter', sans-serif; 
            overflow-x: hidden;
            padding-top: 65px;
        }
        
        /* ================= PROGRESS BAR DI ATAS NAVBAR ================= */
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: transparent;
            z-index: 1032;
        }
        
        .progress-bar {
            height: 3px;
            background: linear-gradient(90deg, #1ABC9C, #e67e22, #1ABC9C);
            background-size: 200% 100%;
            width: 0%;
            border-radius: 0 2px 2px 0;
            transition: width 0.2s ease;
            animation: gradientShift 2s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* ================= NAVBAR PREMIUM - LEBIH RAMPI NG ================= */
        .navbar-custom { 
            background: rgba(26, 188, 156, 0.95);
            backdrop-filter: blur(12px);
            padding: 8px 0; 
            position: fixed;
            top: 0; 
            left: 0;
            right: 0; 
            z-index: 1030;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        /* Efek scroll */
        .navbar-custom.scrolled {
            background: rgba(255, 255, 255, 0.98);
            padding: 6px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        /* NAVBAR BRAND - LEBIH KECIL */
        .navbar-brand { 
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        
        /* BRAND ICON */
        .navbar-brand .brand-icon {
            width: 32px;
            height: 32px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .navbar-brand .brand-icon i {
            font-size: 1rem;
            color: white;
            transition: all 0.3s ease;
        }
        
        .navbar-custom.scrolled .navbar-brand .brand-icon {
            background: rgba(26, 188, 156, 0.1);
        }
        
        .navbar-custom.scrolled .navbar-brand .brand-icon i {
            color: #1ABC9C;
        }
        
        /* NAMA WIJAYA FARMA */
        .navbar-brand .brand-name {
            font-size: 0.95rem;
            font-weight: 800;
            color: white;
            line-height: 1.2;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .navbar-custom.scrolled .navbar-brand .brand-name {
            color: #1ABC9C;
            font-size: 0.9rem;
        }
        
        /* TAGLINE */
        .navbar-brand .brand-tagline {
            font-size: 0.45rem;
            color: rgba(255,255,255,0.8);
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
        }
        
        .navbar-custom.scrolled .navbar-brand .brand-tagline {
            color: #94a3b8;
        }

        /* MENU LINK - LEBIH KECIL */
        .nav-link { 
            display: flex;
            align-items: center;
            gap: 6px;
            color: white !important; 
            font-weight: 500; 
            margin: 0 2px; 
            padding: 6px 12px !important;
            font-size: 0.75rem; 
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        
        .nav-link i {
            font-size: 0.75rem;
            transition: transform 0.2s ease;
        }
        
        .nav-link:hover i {
            transform: translateY(-1px);
        }
        
        .navbar-custom.scrolled .nav-link { 
            color: #334155 !important; 
        }
        
        .nav-link:hover, 
        .nav-link.active { 
            background: rgba(255,255,255,0.2);
            color: white !important; 
            transform: translateY(-1px);
        }
        
        .navbar-custom.scrolled .nav-link:hover,
        .navbar-custom.scrolled .nav-link.active { 
            background: rgba(26, 188, 156, 0.1);
            color: #1ABC9C !important; 
        }

        /* TOMBOL LOGIN - LEBIH KECIL */
        .btn-login { 
            display: flex;
            align-items: center;
            gap: 6px;
            background: white;
            color: #1ABC9C !important; 
            font-weight: 600; 
            border-radius: 30px; 
            padding: 5px 16px !important; 
            font-size: 0.7rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .btn-login i {
            font-size: 0.7rem;
            transition: transform 0.2s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        
        .btn-login:hover i {
            transform: translateX(2px);
        }
        
        .navbar-custom.scrolled .btn-login { 
            background: linear-gradient(135deg, #1ABC9C, #16a085);
            color: white !important;
            box-shadow: 0 2px 8px rgba(26,188,156,0.2);
        }
        
        /* TOGGLER */
        .navbar-toggler {
            border: none;
            background: rgba(255,255,255,0.2);
            padding: 6px 10px;
            border-radius: 8px;
        }
        
        .navbar-toggler-icon {
            width: 20px;
            height: 2px;
            background: white;
            display: block;
            position: relative;
        }
        
        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            width: 20px;
            height: 2px;
            background: white;
            position: absolute;
            left: 0;
        }
        
        .navbar-toggler-icon::before { top: -6px; }
        .navbar-toggler-icon::after { bottom: -6px; }
        
        .navbar-custom.scrolled .navbar-toggler {
            background: rgba(26, 188, 156, 0.1);
        }
        
        .navbar-custom.scrolled .navbar-toggler-icon,
        .navbar-custom.scrolled .navbar-toggler-icon::before,
        .navbar-custom.scrolled .navbar-toggler-icon::after {
            background: #1ABC9C;
        }
        
        /* ================= RESPONSIVE ================= */
        /* Desktop besar (1200px ke atas) - navbar normal */
        @media (min-width: 1200px) {
            .navbar-nav {
                gap: 0;
            }
        }
        
        /* Tablet (992px - 1199px) - menu lebih kecil */
        @media (max-width: 1199px) and (min-width: 992px) {
            .nav-link {
                padding: 5px 8px !important;
                font-size: 0.7rem;
            }
            .btn-login {
                padding: 4px 12px !important;
                font-size: 0.65rem;
            }
            .navbar-brand .brand-name {
                font-size: 0.85rem;
            }
        }
        
        /* Mobile (max 991px) - collapse menu */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: white;
                border-radius: 16px;
                padding: 15px;
                margin-top: 10px;
                box-shadow: 0 15px 30px rgba(0,0,0,0.15);
                border: 1px solid rgba(0,0,0,0.05);
                max-height: 80vh;
                overflow-y: auto;
            }
            .nav-link {
                color: #334155 !important;
                padding: 10px 15px !important;
                margin: 3px 0;
                font-size: 0.8rem;
            }
            .nav-link i {
                color: #1ABC9C;
                width: 24px;
            }
            .nav-link.active {
                background: rgba(26, 188, 156, 0.1);
                color: #1ABC9C !important;
            }
            .btn-login {
                margin-top: 8px;
                justify-content: center;
                background: linear-gradient(135deg, #1ABC9C, #16a085);
                color: white !important;
                padding: 8px 0 !important;
            }
            .navbar-brand .brand-name {
                font-size: 0.9rem;
            }
        }
        
        /* HP kecil (max 480px) */
        @media (max-width: 480px) {
            body {
                padding-top: 58px;
            }
            .navbar-brand .brand-name {
                font-size: 0.75rem;
            }
            .navbar-brand .brand-tagline {
                font-size: 0.4rem;
            }
            .navbar-brand .brand-icon {
                width: 28px;
                height: 28px;
            }
            .navbar-brand .brand-icon i {
                font-size: 0.85rem;
            }
            .navbar-custom {
                padding: 6px 0;
            }
        }
        
        main { 
            min-height: calc(100vh - 150px);
        }
        
        /* FOOTER */
        footer {
            background: white;
            border-top: 1px solid #eef2f6;
            margin-top: 2rem;
            padding: 1rem 0;
            text-align: center;
        }
        
        footer i {
            transition: all 0.3s ease;
        }
        
        footer i:hover {
            transform: scale(1.05);
            opacity: 1 !important;
        }
        
        footer p {
            font-size: 0.65rem;
            color: #64748b;
            margin: 0;
        }
    </style>

    @yield('custom-css')
    
</head>
<body>

<!-- PROGRESS BAR DI ATAS NAVBAR -->
<div class="progress-container">
    <div class="progress-bar" id="scrollProgressBar"></div>
</div>

<nav class="navbar navbar-expand-xl navbar-custom" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
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
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/produk') }}"><i class="fas fa-pills"></i> Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/kategori') }}"><i class="fas fa-tags"></i> Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/layanan') }}"><i class="fas fa-concierge-bell"></i> Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/artikel') }}"><i class="fas fa-newspaper"></i> Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}"><i class="fas fa-building"></i> Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/testimoni') }}"><i class="fas fa-star"></i> Testimoni</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}"><i class="fas fa-envelope"></i> Kontak</a></li>
                
                <li class="nav-item ms-xl-2 mt-2 mt-xl-0">
                    @auth 
                        <a href="{{ url('/admin/dashboard') }}" class="btn-login"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    @else 
                        <a href="{{ url('/login') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</a> 
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <div class="container">
        <i class="fas fa-capsules fs-3 mb-2 d-inline-block" style="color: #1ABC9C; opacity: 0.5;"></i>
        <p>&copy; {{ date('Y') }} <b>Wijaya Farma</b>. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    window.addEventListener('scroll', function() {
        var nav = document.getElementById('mainNavbar');
        var progressBar = document.getElementById('scrollProgressBar');
        
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
        
        if (progressBar) {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + '%';
        }
    });
</script>

@yield('custom-js')

</body>
</html>