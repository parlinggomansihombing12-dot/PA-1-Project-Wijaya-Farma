@extends('layouts.main')

@section('content')
<!-- Tambahkan FontAwesome untuk ikon yang lebih stabil -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="max-w-6xl mx-auto mt-10 px-4 pb-20">

    <!-- HEADER / HERO SECTION -->
    <div class="relative overflow-hidden bg-gradient-to-r from-green-600 to-teal-500 text-white rounded-3xl p-8 mb-8 shadow-lg">
        <div class="relative z-10">
            <span class="bg-white/20 text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full border border-white/30">Profil Resmi</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-4">Apotek Wijaya Farma</h2>
            <p class="text-lg opacity-90 mt-2 flex items-center gap-2">
                <i class="fas fa-check-circle text-white"></i> Melayani kebutuhan kesehatan dengan aman dan terpercaya
            </p>
        </div>
        <!-- Dekorasi background -->
        <div class="absolute -right-10 -bottom-10 opacity-10 text-9xl">
            <i class="fas fa-plus-square"></i>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-8">

        <!-- KIRI: PROFIL TOKO -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="bg-green-100 p-3 rounded-xl text-green-600">
                        <i class="fas fa-store text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 tracking-tight">Tentang Kami</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
                    <!-- Deskripsi (Full Width) -->
                    <div class="md:col-span-2 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                        <p class="text-gray-500 mb-1 uppercase text-xs font-bold tracking-wider">Deskripsi</p>
                        <p class="text-gray-700 leading-relaxed text-base">
                            Apotek Wijaya Farma adalah pusat pelayanan obat dan alat kesehatan yang berkomitmen menyediakan produk berkualitas, vitamin, dan konsultasi kesehatan bagi masyarakat di wilayah Toba.
                        </p>
                    </div>

                    <!-- Alamat -->
                    <div class="flex gap-4">
                        <div class="text-green-500 mt-1"><i class="fas fa-map-marker-alt text-lg"></i></div>
                        <div>
                            <p class="text-gray-400 font-semibold uppercase text-[10px]">Alamat Lengkap</p>
                            <p class="text-gray-800 font-medium leading-relaxed">
                                Jl. Lintas Porsea - Laguboti, Kec. Sigumpar, Kab. Toba, Sumatera Utara
                            </p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="flex gap-4">
                        <div class="text-orange-500 mt-1"><i class="fas fa-clock text-lg"></i></div>
                        <div>
                            <p class="text-gray-400 font-semibold uppercase text-[10px]">Jam Operasional</p>
                            <p class="text-gray-800 font-bold">08.00 - 22.00</p>
                            <p class="text-green-600 text-xs font-medium italic">Melayani Setiap Hari</p>
                        </div>
                    </div>

                    <!-- Layanan -->
                    <div class="md:col-span-2 flex gap-4">
                        <div class="text-blue-500 mt-1"><i class="fas fa-hand-holding-medical text-lg"></i></div>
                        <div>
                            <p class="text-gray-400 font-semibold uppercase text-[10px]">Layanan Unggulan</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @foreach(['Obat Umum', 'Resep Dokter', 'Vitamin', 'Alkes', 'Konsultasi'] as $tag)
                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KANAN: PROFIL PEMILIK & SOSMED -->
        <div class="space-y-6">
            <!-- Card Pemilik -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-green-500"></div>
                
                <h3 class="text-xl font-bold text-gray-800 mb-6">Apoteker Penanggung Jawab</h3>

                <div class="relative inline-block mb-4">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=300"
                         class="w-32 h-32 mx-auto rounded-3xl object-cover shadow-lg border-4 border-white">
                    <div class="absolute -bottom-2 -right-2 bg-green-500 text-white p-2 rounded-xl shadow-md">
                        <i class="fas fa-user-nurse"></i>
                    </div>
                </div>

                <p class="text-lg font-extrabold text-gray-800 leading-tight">
                    Bdn. Yesika Pradinata Sitohang, S.Keb
                </p>
                <p class="text-green-600 text-sm font-medium mt-1">Pemilik & Pengelola</p>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <h4 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Hubungi Kami</h4>
                    
                    <div class="space-y-3">
                        <!-- Instagram -->
                        <a href="#" class="flex items-center gap-4 p-3 rounded-2xl bg-gray-50 hover:bg-pink-50 hover:text-pink-600 transition-all group">
                            <i class="fab fa-instagram text-xl text-pink-500 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-bold text-gray-700 group-hover:text-pink-600">@wijayafarma</span>
                        </a>

                        <!-- Facebook -->
                        <a href="#" class="flex items-center gap-4 p-3 rounded-2xl bg-gray-50 hover:bg-blue-50 hover:text-blue-600 transition-all group">
                            <i class="fab fa-facebook text-xl text-blue-600 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-bold text-gray-700 group-hover:text-blue-600">Wijaya Farma</span>
                        </a>

                        <!-- TikTok -->
                        <a href="#" class="flex items-center gap-4 p-3 rounded-2xl bg-gray-50 hover:bg-gray-200 transition-all group text-black">
                            <i class="fab fa-tiktok text-xl group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-bold text-gray-700">@wijayafarma</span>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/6281234567890" class="flex items-center gap-4 p-3 rounded-2xl bg-green-50 text-green-700 hover:bg-green-100 transition-all border border-green-100 group">
                            <i class="fab fa-whatsapp text-xl group-hover:scale-110 transition-transform"></i>
                            <div class="text-left">
                                <p class="text-[10px] uppercase font-bold opacity-70 leading-none">Chat Sekarang</p>
                                <span class="text-sm font-extrabold text-green-700">0812-3456-7890</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection