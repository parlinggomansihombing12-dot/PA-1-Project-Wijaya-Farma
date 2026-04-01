<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijaya Farma - @yield('title', 'Apotek Terpercaya')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (Penting untuk Ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --tema-hijau: #1ABC9C;
            --tema-tua: #16a085;
        }

        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; }

        /* NAVBAR PREMIUM */
        .navbar-custom {
            background-color: var(--tema-hijau);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand { font-weight: 800; letter-spacing: 1px; }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: white !important;
            transform: translateY(-2px);
        }

        .btn-login {
            background-color: white;
            color: var(--tema-hijau) !important;
            font-weight: 700;
            border-radius: 50px;
            padding: 8px 25px !important;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #f0f0f0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        /* GLOBAL UTILITY */
        .card-custom { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .teks-hijau { color: var(--tema-hijau); }
        .bg-hijau { background-color: var(--tema-hijau); }
    </style>
</head>
<body>

<!-- NAVBAR RESPONSIVE -->
<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand text-white" href="/">
            <i class="fas fa-pills me-2"></i>Wijaya Farma
        </a>
        
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('layanan*') ? 'active' : '' }}" href="/layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}" href="/artikel">Artikel</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('profil*') ? 'active' : '' }}" href="/profil">Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
                
                <li class="nav-item ms-lg-3">
                    @auth
                        <a href="/admin/dashboard" class="btn btn-login shadow-sm">Dashboard</a>
                    @else
                        <a href="/login" class="btn btn-login shadow-sm">Login Admin</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="min-vh-100">
    @yield('content')
</div>

<!-- FOOTER -->
<footer class="bg-white py-5 mt-5 border-top">
    <div class="container text-center">
        <p class="text-muted mb-0">&copy; {{ date('Y') }} <b>Wijaya Farma</b>. Melayani Dengan Sepenuh Hati.</p>
    </div>
</footer>

<!-- JS BOOTSTRAP (WAJIB ADA AGAR RESPONSIVE/MODAL JALAN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>