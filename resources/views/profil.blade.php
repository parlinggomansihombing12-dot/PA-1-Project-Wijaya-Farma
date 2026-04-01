@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">

    <!-- HEADER -->
    <div class="bg-green-500 text-white rounded-2xl p-6 mb-6 shadow">
        <h2 class="text-xl font-semibold">Apotek Wijaya Farma</h2>
        <p class="text-sm opacity-90">
            Melayani kebutuhan kesehatan dengan aman dan terpercaya
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- PROFIL TOKO -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow p-6">

            <h3 class="text-lg font-semibold text-green-600 mb-4">
                Profil Toko
            </h3>

            <div class="space-y-4 text-sm">

                <div>
                    <p class="text-gray-500">Nama Toko</p>
                    <p class="font-medium text-gray-800">Wijaya Farma</p>
                </div>

                <div>
                    <p class="text-gray-500">Deskripsi</p>
                    <p class="text-gray-700">
                        Apotek Wijaya Farma menyediakan berbagai obat, vitamin, dan layanan kesehatan 
                        untuk membantu masyarakat menjaga kesehatan dengan aman dan terpercaya.
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p class="text-gray-700">
                        Jl. Lintas Porsea - Laguboti<br>
                        Kec. Sigumpar, Kab. Toba
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Jam Operasional</p>
                    <p class="text-gray-800">
                        08.00 - 22.00 (Setiap Hari)
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Layanan</p>
                    <p class="text-gray-800">
                        Obat umum, resep dokter, vitamin, alat kesehatan, konsultasi
                    </p>
                </div>

            </div>
        </div>

        <!-- PROFIL PEMILIK -->
        <div class="bg-white rounded-2xl shadow p-6 text-center">

            <h3 class="text-lg font-semibold text-green-600 mb-6">
                Profil Pemilik
            </h3>

            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=300"
                 class="w-32 h-32 mx-auto rounded-full object-cover mb-4 shadow">

            <p class="text-lg font-semibold text-gray-800 mb-4">
                Bdn. Yesika Pradinata Sitohang, S.Keb
            </p>

            <!-- SOSIAL MEDIA -->
           <div class="text-sm text-gray-700 space-y-3 text-left">

    <!-- Instagram -->
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.66 0-3-1.34-3-3V7c0-1.66 1.34-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-2.75a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"/>
        </svg>
        <span><b>Instagram:</b> @wijayafarma</span>
    </div>

    <!-- Facebook -->
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22 12a10 10 0 10-11.5 9.87v-6.99H7.9V12h2.6V9.8c0-2.57 1.53-4 3.88-4 1.12 0 2.3.2 2.3.2v2.5h-1.3c-1.28 0-1.68.8-1.68 1.6V12h2.86l-.46 2.88h-2.4v6.99A10 10 0 0022 12z"/>
        </svg>
        <span><b>Facebook:</b> Wijaya Farma</span>
    </div>

    <!-- TikTok -->
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
            <path d="M16 3a5 5 0 003 3.87V10a7 7 0 01-4-1.26V16a6 6 0 11-6-6c.34 0 .67.03 1 .08v3.06a3 3 0 10-2-2.84V7a6 6 0 018 6V3h2z"/>
        </svg>
        <span><b>TikTok:</b> @wijayafarma</span>
    </div>

    <!-- WhatsApp -->
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20 3.5A11 11 0 003.3 18.2L2 22l3.9-1.2A11 11 0 1020 3.5zm-8 16a9 9 0 01-4.6-1.3l-.3-.2-2.3.7.7-2.2-.2-.3A9 9 0 1112 19.5zm5-6.7c-.3-.2-1.8-.9-2-1s-.4-.2-.6.2-.7 1-1 1.2-.5.2-.8 0a7.4 7.4 0 01-2.2-1.4 8.2 8.2 0 01-1.5-1.9c-.2-.3 0-.5.1-.7l.5-.6c.2-.2.2-.3.3-.5 0-.2 0-.4-.1-.6s-.6-1.5-.9-2c-.3-.5-.6-.4-.8-.4h-.7c-.2 0-.6.1-.9.4s-1.1 1-1.1 2.4 1.2 2.8 1.3 3c.2.2 2.3 3.5 5.5 4.9.8.3 1.4.5 1.9.6.8.2 1.5.2 2 .1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4 0-.1-.2-.2-.5-.4z"/>
        </svg>
        <span><b>WhatsApp:</b> 0812-3456-7890</span>
    </div>

    </div>

    </div>

</div>
@endsection