<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;      // Pastikan ini ada
use App\Models\Kategori;    // INI YANG TADI KURANG (Penyebab Error)
use App\Models\ProfilToko;  // Pastikan ini ada

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $toko = ProfilToko::first();
        
        // Ambil semua kategori untuk ditampilkan di sidebar
        $kategoris = Kategori::all(); 

        $query = Produk::query();

        // 1. Fitur Filter Kategori dari Sidebar (Jika ada ?kategori_id=... di URL)
        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $query->where('kategori_id', $request->kategori_id);
        }

        // 2. Fitur Pencarian Biasa
        if ($request->has('cari') && $request->cari != '') {
            $query->where('nama_obat', 'like', '%' . $request->cari . '%');
        }

        $list_produk = $query->latest()->get();

        // Mengirimkan data ke view produk.blade.php
        return view('produk', [
            'toko' => $toko,
            'kategoris' => $kategoris, // Tambahkan ini agar bisa di-loop di sidebar
            'list_produk' => $list_produk
        ]);
    }
}