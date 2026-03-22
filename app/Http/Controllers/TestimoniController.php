<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;   // Panggil Model Testimoni
use App\Models\ProfilToko;  // Panggil Model Profil Toko untuk Navbar

class TestimoniController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        
        // Ambil semua data testimoni, urutkan dari yang terbaru
        $testimoni = Testimoni::latest()->get();

        return view('testimoni',[
            'toko' => $toko,
            'list_testimoni' => $testimoni
        ]);
    }
}