<nav class="navbar navbar-expand-lg navbar-dark navbar-tema shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">💊 {{ $toko->nama_toko ?? 'Wijaya Farma' }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <!-- PASTIKAN SEMUA HREF DIMULAI DENGAN TANDA "/" -->
        <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}" href="/">Beranda</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('produk') ? 'active fw-bold' : '' }}" href="/produk">Produk</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('kategori') ? 'active fw-bold' : '' }}" href="/kategori">Kategori</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('layanan') ? 'active fw-bold' : '' }}" href="/layanan">Layanan</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('artikel') ? 'active fw-bold' : '' }}" href="/artikel">Artikel</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('profil') ? 'active fw-bold' : '' }}" href="/profil">Profil</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('testimoni') ? 'active fw-bold' : '' }}" href="/testimoni">Testimoni</a></li>
        <li class="nav-item me-3"><a class="nav-link {{ request()->is('kontak') ? 'active fw-bold' : '' }}" href="/kontak">Kontak</a></li>
        
        <!-- TOMBOL LOGIN / DASHBOARD ADMIN -->
        @auth
            <li class="nav-item">
                <a href="/admin/dashboard" class="btn btn-warning btn-sm fw-bold px-3 text-dark">Dashboard Admin</a>
            </li>
        @else
            <li class="nav-item">
                <a href="/login" class="btn btn-outline-light btn-sm fw-bold px-3">Login Admin</a>
            </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>