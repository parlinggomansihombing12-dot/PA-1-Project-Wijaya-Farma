<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;     // <-- Panggil Model Produk
use App\Models\ProfilToko; // <-- Panggil juga ProfilToko (untuk Nama di Navbar)

class ProdukController extends Controller
{
    public function index()
    {
        // 1. Ambil data Toko (untuk Navbar)
        $toko = ProfilToko::first();

        // 2. Ambil SEMUA data Produk
        $produk = Produk::all();

        // 3. Kirim kedua data ke View
        return view('produk', [
            'toko' => $toko,
            'list_produk' => $produk
        ]);
    }
}