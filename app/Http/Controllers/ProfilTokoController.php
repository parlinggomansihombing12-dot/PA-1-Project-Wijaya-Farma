<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko; // <-- Jangan lupa baris ini agar Model terpanggil

class ProfilTokoController extends Controller
{
    public function index()
    {
        // Ambil data toko yang pertama ditemukan
        $toko = ProfilToko::first();

        // Kirim data ke view dengan nama variabel 'toko'
        return view('profil', ['toko' => $toko]);
    }
}