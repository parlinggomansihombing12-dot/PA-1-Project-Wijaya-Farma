<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Wijaya Farma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #F8F9F9; color: #2C3E50; overflow-x: hidden; }
        .teks-hijau { color: #1ABC9C; }
        .btn-tema { background-color: #1ABC9C; color: white; border: none; }
        
        /* Layout CSS agar Sidebar dan Konten Berdampingan */
        .wrapper { display: flex; width: 100%; align-items: stretch; }
        #content { width: 100%; padding: 20px; min-height: 100vh; }
    </style>
</head>
<body>

    <div class="wrapper">
        <!-- 1. PANGGIL SIDEBAR ADMIN (Bukan Navbar) -->
        @include('sidebar_admin') {{-- Pastikan nama file sidebar Anda 'sidebar_admin.blade.php' --}}

        <!-- 2. AREA KONTEN UTAMA -->
        <div id="content">
            <!-- Header Kecil (Opsional untuk menyapa Admin) -->
            <div class="d-flex justify-content-end mb-3">
                <span class="badge bg-light text-dark p-2 shadow-sm">
                    Halo, <strong>{{ Auth::user()->name }}</strong>!
                </span>
            </div>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>