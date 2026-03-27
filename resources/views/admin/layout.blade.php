<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Wijaya Farma</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #2C3E50;
            color: white;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            color: #ccc;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1ABC9C;
            color: white;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center py-3">💊 Admin</h4>

    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/produk">Produk</a>
    <a href="/admin/kategori">Kategori</a>
    <a href="/admin/layanan">Layanan</a>
    <a href="/admin/artikel">Artikel</a>
    <a href="/admin/testimoni">Testimoni</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>