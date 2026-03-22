<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko; // <-- Panggil Model ProfilToko

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data toko
        $toko = ProfilToko::first();

        // Tampilkan view 'beranda' sambil kirim data toko
        return view('beranda', ['toko' => $toko]);
    }
}