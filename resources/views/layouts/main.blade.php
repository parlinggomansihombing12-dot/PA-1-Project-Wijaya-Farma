<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul akan berubah-ubah sesuai halaman -->
    <title>@yield('title', 'Apotek Wijaya Farma')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS TEMA GLOBAL -->
    <style>
        body { background-color: #F8F9F9; color: #2C3E50; }
        .navbar-tema { background-color: #1ABC9C !important; }
        .btn-tema { background-color: #2980B9; color: white; border: none; }
        .btn-tema:hover { background-color: #1f6391; color: white; }
        .teks-hijau { color: #1ABC9C; }
    </style>
    
    <!-- Tempat untuk menyisipkan CSS khusus halaman tertentu -->
    @stack('custom-css')
</head>
<body>

    <!-- Panggil Navbar Pintar Kita -->
    @include('navbar')

    <!-- DI SINI KONTEN UTAMA AKAN DISUNTIKKAN -->
    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Tempat untuk menyisipkan Script khusus halaman tertentu -->
    @stack('custom-js')
</body>
</html>