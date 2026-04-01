<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProfilToko;

class ProdukController extends Controller
{
    // Buka file: app/Http/Controllers/ProdukController.php

public function index(Request $request)
{
    $toko = ProfilToko::first();
    $kategoris = Kategori::all(); 

    $query = Produk::query();

    if ($request->has('kategori') && $request->kategori != '') {
        $query->where('kategori_id', $request->kategori);
    }

    if ($request->has('search') && $request->search != '') {
        $query->where('nama_obat', 'like', '%' . $request->search . '%');
    }

    // UBAH BARIS INI: Dari ->get() menjadi ->paginate(9)
    $list_produk = $query->latest()->paginate(9); 

    return view('produk', [
        'toko' => $toko,
        'list_kategori' => $kategoris,
        'list_produk' => $list_produk
    ]);
}
}