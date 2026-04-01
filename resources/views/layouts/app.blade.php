<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wijaya Farma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background-color: #14B8A6;
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: white !important;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #d1fae5 !important;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold" href="/">
            Wijaya Farma
        </a>

        <!-- TOGGLE MOBILE -->
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            ☰
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/produk">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/testimoni">Testimoni</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/kontak">Kontak</a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<!-- CONTENT -->
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>