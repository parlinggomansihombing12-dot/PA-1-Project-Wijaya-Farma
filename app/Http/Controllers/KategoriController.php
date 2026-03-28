<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\ProfilToko;

// PERHATIKAN BARIS INI: Namanya HARUS KategoriController (tanpa kata Admin)
class KategoriController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $kategori = Kategori::all();

        // Mengarahkan pengunjung ke halaman kategori biasa
        return view('kategori',[
            'toko' => $toko,
            'list_kategori' => $kategori
        ]);
    }
}