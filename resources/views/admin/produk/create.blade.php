<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="bg-white p-6 rounded shadow max-w-md mx-auto">
    <h2 class="text-lg font-bold mb-4">Tambah Produk</h2>

    {{-- ALERT ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produk.store') }}" method="POST">
        @csrf

        <input 
            type="text" 
            name="nama_obat" 
            placeholder="Nama Obat"
            value="{{ old('nama_obat') }}"
            class="w-full border p-2 mb-2 rounded"
        >

        <input 
            type="number" 
            name="harga" 
            placeholder="Harga"
            value="{{ old('harga') }}"
            class="w-full border p-2 mb-2 rounded"
        >

        <input 
            type="number" 
            name="stok" 
            placeholder="Stok"
            value="{{ old('stok') }}"
            class="w-full border p-2 mb-4 rounded"
        >

        <button 
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">
            Simpan
        </button>

        <a href="{{ route('admin.produk.index') }}" 
           class="block text-center mt-3 text-gray-600 hover:underline">
            Kembali
        </a>
    </form>
</div>

</body>
</html>