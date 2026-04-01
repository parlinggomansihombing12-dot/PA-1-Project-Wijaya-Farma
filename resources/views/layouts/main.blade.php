<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE GLOBAL -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #1ABC9C;
        }

        .navbar a {
            color: white !important;
            font-weight: 500;
        }

        .navbar a:hover {
            color: #e8f8f5 !important;
        }

        .btn-tema {
            background-color: #1ABC9C;
            color: white;
        }

        .btn-tema:hover {
            background-color: #159a80;
            color: white;
        }

        .teks-hijau {
            color: #1ABC9C;
        }
    </style>

    @stack('custom-css')
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="/">Wijaya Farma</a>

        <div class="ms-auto">
            <a href="/produk" class="me-3">Produk</a>
            <a href="/artikel" class="me-3">Artikel</a>
            <a href="/kontak" class="me-3">Kontak</a>

            <!-- ADMIN -->
            <a href="/admin/dashboard" class="btn btn-light btn-sm">Dashboard</a>
        </div>
    </div>
</nav>

<!-- CONTENT -->
@yield('content')

</body>
</html>