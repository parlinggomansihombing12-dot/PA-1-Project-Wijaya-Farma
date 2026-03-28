<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\ProfilToko;

class KategoriController extends Controller
{
    // FUNGSI INI KHUSUS UNTUK PENGUNJUNG WEB (TIDAK PERLU LOGIN)
    public function index()
    {
        $toko = ProfilToko::first();
        $kategori = Kategori::all();

        // HARUS MENGARAH KE FILE 'kategori.blade.php' YANG DI LUAR (BUKAN FOLDER ADMIN)
        return view('kategori',[
            'toko' => $toko,
            'list_kategori' => $kategori
        ]);
    }
}