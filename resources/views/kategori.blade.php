@extends('layouts.frontend') {{-- Jika Anda punya layout khusus pengunjung --}}

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-teal-600 text-center mb-8">Kategori Produk Kami</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Contoh Card -->
        <div class="bg-white p-6 shadow rounded-lg text-center border-t-4 border-teal-500">
            <h3 class="font-bold text-xl">Obat Bebas</h3>
            <p class="text-gray-500 text-sm">Dapat dibeli tanpa resep.</p>
            <a href="#" class="mt-4 inline-block text-teal-600 font-semibold">Lihat Produk →</a>
        </div>
        <!-- Ulangi untuk kategori lainnya -->
    </div>
</div>
@endsection