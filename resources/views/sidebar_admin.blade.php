<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 100vh; background-color: #2c3e50 !important;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4 fw-bold">💊 Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active text-white' : 'text-white' }}" 
               style="{{ request()->is('admin/dashboard') ? 'background-color: #1abc9c;' : '' }}">
                🏠 Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/produk') }}" class="nav-link {{ request()->is('admin/produk') ? 'active text-white' : 'text-white' }}"
               style="{{ request()->is('admin/produk') ? 'background-color: #1abc9c;' : '' }}">
                📦 Kelola Produk
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/kategori') }}" class="nav-link {{ request()->is('admin/kategori*') ? 'active text-white' : 'text-white' }}"
               style="{{ request()->is('admin/kategori*') ? 'background-color: #1abc9c;' : '' }}">
                📂 Kelola Kategori
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                🩺 Kelola Layanan
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                📄 Kelola Artikel
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                ⭐ Kelola Testimoni
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                ⚙️ Profil Toko
            </a>
        </li>
    </ul>
    <hr>
    <div class="mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100 fw-bold">Keluar (Logout)</button>
        </form>
    </div>
</div>

<style>
    .nav-link:hover {
        background-color: rgba(26, 188, 156, 0.5);
        color: white !important;
    }
</style>