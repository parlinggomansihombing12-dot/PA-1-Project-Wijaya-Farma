<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProfilToko;

class ProdukController extends Controller
{
    /**
     * Menampilkan Katalog Produk (Halaman Utama Produk)
     */
    public function index(Request $request)
    {
        $toko = ProfilToko::first();
        $kategoris = Kategori::all(); 

        $query = Produk::with('kategori');

        // Logika Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        // Logika Pencarian
        if ($request->filled('cari')) {
            $query->where('nama_obat', 'like', '%' . $request->cari . '%');
        }

        $list_produk = $query->latest()->paginate(12)->appends($request->all()); 

        return view('produk', [
            'toko' => $toko,
            'list_kategori' => $kategoris,
            'list_produk' => $list_produk
        ]);
    }

    /**
     * FUNGSI BARU: Menampilkan Detail Satu Produk
     */
    public function show($id)
    {
        // 1. Ambil data profil toko (untuk info WA di footer/tombol pesan)
        $toko = ProfilToko::first();

        // 2. Ambil data produk berdasarkan ID beserta kategorinya
        // findOrFail akan otomatis menampilkan error 404 jika ID tidak ditemukan
        $item = Produk::with('kategori')->findOrFail($id);

        // 3. Tampilkan ke halaman view 'produk_details'
        return view('produk_details', [
            'toko' => $toko,
            'item' => $item
        ]);
    }
}