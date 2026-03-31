<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\ProfilToko;

class ArtikelController extends Controller
{
    // ✅ HALAMAN LIST ARTIKEL
    public function index()
    {
        $toko = ProfilToko::first();
        $artikel = Artikel::latest()->get();

        return view('artikel', [
            'toko' => $toko,
            'list_artikel' => $artikel
        ]);
    }

    // ✅ HALAMAN DETAIL ARTIKEL (INI YANG KURANG)
    public function show($id)
    {
        $toko = ProfilToko::first();
        $artikel = Artikel::findOrFail($id);

        return view('artikel_detail', [
            'toko' => $toko,
            'artikel' => $artikel
        ]);
    }
}