<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProfilToko;

class ProdukController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $produk = Produk::all();

        // MENGARAH KE HALAMAN PENGUNJUNG (Bukan admin.produk)
        return view('produk',[
            'toko' => $toko,
            'list_produk' => $produk
        ]);
    }
}