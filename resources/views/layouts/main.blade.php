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

    <!-- CSS TEMA UTAMA & NAVBAR MODERN -->
    <style>
        :root { 
            --tema-hijau: #1ABC9C; 
            --tema-tua: #16a085; 
            --teks-gelap: #2c3e50;
        }
        
        body { 
            background-color: #f8fcfb; 
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            padding: 0; 
            overflow-x: hidden;
        }
        
        /* ================= NAVBAR FLOATING TRANSPARAN ================= */
        /* Navbar bawaan menjadi transparan dan menyatu dengan foto Hero di bawahnya */
        .navbar-custom { 
            background-color: rgba(26, 188, 156, 0.95); /* Hijau tosca agak transparan default */
            backdrop-filter: blur(10px); /* Efek kaca buram (Glassmorphism) */
            padding: 15px 0; 
            transition: all 0.4s ease;
            position: fixed; /* Membuat navbar melayang di atas segalanya */
            top: 0; 
            left: 0; 
            right: 0; 
            z-index: 1030;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Saat layar di-scroll (Kelas ini akan ditambahkan oleh JavaScript) */
        .navbar-custom.scrolled {
            background-color: rgba(255, 255, 255, 0.98); /* Berubah putih */
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 10px 0; /* Mengecil sedikit saat di-scroll */
            border-bottom: none;
        }

        /* Efek Logo Teks */
        .navbar-brand { font-size: 1.5rem; letter-spacing: -0.5px; transition: 0.3s; }
        .navbar-custom.scrolled .navbar-brand { color: var(--tema-hijau) !important; }

        /* Efek Menu Link (Garis Bawah Menyala) */
        .nav-link { 
            color: rgba(255,255,255,0.85) !important; 
            font-weight: 500; 
            margin: 0 8px; 
            transition: all 0.3s; 
            font-size: 0.95rem; 
            position: relative;
        }
        .navbar-custom.scrolled .nav-link { color: #596275 !important; } /* Berubah abu tua saat navbar putih */
        
        /* Garis Bawah yang tersembunyi */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0; height: 3px;
            bottom: 0; left: 50%;
            background-color: white;
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 5px;
        }
        .navbar-custom.scrolled .nav-link::after { background-color: var(--tema-hijau); }

        /* Efek saat Disentuh (Hover) atau Aktif */
        .nav-link:hover, .nav-link.active { color: white !important; font-weight: 700; }
        .navbar-custom.scrolled .nav-link:hover, .navbar-custom.scrolled .nav-link.active { color: var(--tema-hijau) !important; }
        
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }

        /* Tombol Login/Dashboard */
        .btn-login { 
            background-color: white; 
            color: var(--tema-hijau) !important; 
            font-weight: 700; 
            border-radius: 50px; 
            padding: 10px 25px !important; 
            border: none; 
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        
        /* Tombol Berubah Saat Navbar di-scroll (Putih) */
        .navbar-custom.scrolled .btn-login { background-color: var(--tema-hijau); color: white !important; }

        /* Mendorong Konten Utama ke Bawah (Karena Navbar Fixed) */
        main { padding-top: 80px; }
    </style>

    <!-- Panggilan CSS Khusus Anak (Jangan dihapus) -->
    @yield('custom-css')
    
</head>
<body>

<nav class="navbar navbar-expand-xl navbar-custom" id="mainNavbar">
    <div class="container">
        <!-- Logo Apotek -->
        <a class="navbar-brand text-white fw-bold" href="/">
            <i class="fas fa-capsules me-2"></i>WIJAYA FARMA
        </a>
        
        <!-- Tombol Menu HP -->
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fas fa-bars fs-3"></i>
        </button>
        
        <!-- Daftar Menu -->
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
                
                <!-- Pemisah Tombol Login -->
                <li class="nav-item ms-lg-4 mt-3 mt-xl-0">
                    @auth 
                        <a href="/admin/dashboard" class="btn btn-login"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a>
                    @else 
                        <a href="/login" class="btn btn-login"><i class="fas fa-sign-in-alt me-1"></i> Login Admin</a> 
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

<!-- FOOTER BERSAMA -->
<footer class="bg-white py-5 mt-5 border-top">
    <div class="container text-center text-muted">
        <h4 class="fw-bold mb-3" style="color: var(--teks-gelap);"><i class="fas fa-capsules me-2" style="color: var(--tema-hijau);"></i>WIJAYA FARMA</h4>
        <p class="mb-4">Melayani Kesehatan Keluarga Anda Dengan Sepenuh Hati.</p>
        <p class="small mb-0 opacity-75">&copy; {{ date('Y') }} <b>Apotek Wijaya Farma</b>. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JAVASCRIPT AJAIB UNTUK EFEK NAVBAR SCROLL (GLASSMORPHISM) -->
<script>
    document.addEventListener("DOMContentLoaded", function(){
        window.addEventListener('scroll', function() {
            var nav = document.getElementById('mainNavbar');
            var togglerIcon = document.querySelector('.navbar-toggler i'); // Ikon menu hamburger HP
            
            if (window.scrollY > 50) {
                // Jika di-scroll ke bawah lebih dari 50px, ubah navbar jadi putih
                nav.classList.add('scrolled');
                if(togglerIcon) {
                    togglerIcon.classList.remove('text-white');
                    togglerIcon.style.color = '#1ABC9C'; // Ikon HP jadi hijau
                }
            } else {
                // Jika kembali ke paling atas, ubah navbar jadi hijau transparan lagi
                nav.classList.remove('scrolled');
                if(togglerIcon) {
                    togglerIcon.classList.add('text-white');
                    togglerIcon.style.color = 'white'; // Ikon HP jadi putih
                }
            }
        });
    });
</script>

<!-- Panggilan JS Anak -->
@yield('custom-js')

</body>
</html>