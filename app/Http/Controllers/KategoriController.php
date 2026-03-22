<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;    // Panggil model Kategori
use App\Models\ProfilToko;  // Panggil model ProfilToko untuk Navbar

class KategoriController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $kategori = Kategori::all();

        return view('kategori',[
            'toko' => $toko,
            'list_kategori' => $kategori
        ]);
    }
}