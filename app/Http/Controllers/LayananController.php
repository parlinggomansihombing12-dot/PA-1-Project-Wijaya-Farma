<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;    // Panggil Model Layanan
use App\Models\ProfilToko; // Panggil Model Profil Toko untuk Navbar

class LayananController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $layanan = Layanan::all();

        return view('layanan',[
            'toko' => $toko,
            'list_layanan' => $layanan
        ]);
    }
}