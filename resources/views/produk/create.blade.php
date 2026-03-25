<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="bg-white p-6 rounded shadow max-w-md mx-auto">
    <h2 class="text-lg font-bold mb-4">Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <input type="text" name="nama_obat" placeholder="Nama Obat" class="w-full border p-2 mb-2">
        <input type="number" name="harga" placeholder="Harga" class="w-full border p-2 mb-2">
        <input type="number" name="stok" placeholder="Stok" class="w-full border p-2 mb-4">

        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">Simpan</button>
    </form>
</div>

</body>
</html>