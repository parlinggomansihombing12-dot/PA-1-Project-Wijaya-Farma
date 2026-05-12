<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\ProfilToko;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $toko = ProfilToko::first();
        
        // 1. Ambil semua kategori untuk Sidebar di kiri
        $list_kategori = Kategori::all(); 

        // ==============================================================
        // INI TAMBAHAN PENTINGNYA (Untuk menjaga angka 'Semua Produk')
        // Menghitung murni SELURUH data produk di database tanpa syarat apapun
        $total_semua_produk = Produk::count(); 
        // ==============================================================

        // 2. Mulai proses pemanggilan Produk untuk grid di kanan (Dengan Filter)
        $query = Produk::query();

        // Jika pengunjung mengklik salah satu kategori di sidebar
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_id', $request->kategori);
        }

        // Jika pengunjung mengetik di kotak pencarian
        if ($request->has('cari') && $request->cari != '') {
            $query->where('nama_obat', 'like', '%' . $request->cari . '%');
        }

        // Eksekusi pengambilan data produk sesuai filter
        $list_produk = $query->latest()->get();

        // 3. Kirim semua data (termasuk total bersih) ke halaman kategori.blade.php
        return view('kategori', [
            'toko' => $toko,
            'list_kategori' => $list_kategori,
            'list_produk' => $list_produk,
            'kategori_aktif' => $request->kategori, 
            'total_semua_produk' => $total_semua_produk // <--- PASTIKAN INI DIKIRIM!
        ]);
    }
}