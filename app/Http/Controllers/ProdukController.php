<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProfilToko;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $toko = ProfilToko::first();
        
        // Fitur Pencarian Biasa (Jika ada pengunjung yang mengetik di kotak pencarian)
        $query = Produk::query();
        if ($request->has('cari') && $request->cari != '') {
            $query->where('nama_obat', 'like', '%' . $request->cari . '%');
        }

        $list_produk = $query->latest()->get();

        // MENGARAH KE FILE 'produk.blade.php'
        return view('produk', [
            'toko' => $toko,
            'list_produk' => $list_produk
        ]);
    }
}