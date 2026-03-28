<!-- SIDEBAR PINTAR -->
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-center mb-4 text-white fw-bold mt-3">💊 Admin Panel</h4>
            
            <!-- PASTIKAN SEMUA HREF DIMULAI DENGAN /admin/ -->
            <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
            <a href="/admin/produk" class="{{ request()->is('admin/produk') ? 'active' : '' }}">📦 Kelola Produk</a>
            <a href="/admin/kategori" class="{{ request()->is('admin/kategori') ? 'active' : '' }}">📂 Kelola Kategori</a>
            <a href="/admin/layanan" class="{{ request()->is('admin/layanan') ? 'active' : '' }}">⚕️ Kelola Layanan</a>
            <a href="/admin/artikel" class="{{ request()->is('admin/artikel') ? 'active' : '' }}">📝 Kelola Artikel</a>
            <a href="/admin/testimoni" class="{{ request()->is('admin/testimoni') ? 'active' : '' }}">⭐ Kelola Testimoni</a>
            <a href="/admin/profil" class="{{ request()->is('admin/profil') ? 'active' : '' }}">⚙️ Profil Toko</a>
            
            <hr class="text-secondary mx-3">
            <div class="px-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Keluar (Logout)</button>
                </form>
            </div>
        </div>