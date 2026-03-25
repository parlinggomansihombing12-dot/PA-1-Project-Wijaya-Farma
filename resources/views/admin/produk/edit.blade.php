<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="bg-white p-6 rounded shadow max-w-md mx-auto">
    <h2 class="text-lg font-bold mb-4">Edit Produk</h2>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nama_obat" value="{{ $produk->nama_obat }}" class="w-full border p-2 mb-2">
        <input type="number" name="harga" value="{{ $produk->harga }}" class="w-full border p-2 mb-2">
        <input type="number" name="stok" value="{{ $produk->stok }}" class="w-full border p-2 mb-4">

        <button class="bg-green-600 text-white px-4 py-2 rounded w-full">Update</button>
    </form>
</div>

</body>
</html>