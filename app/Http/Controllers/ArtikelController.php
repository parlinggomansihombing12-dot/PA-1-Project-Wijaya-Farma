<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\ProfilToko;

class ArtikelController extends Controller
{
    // MENGAMBIL SEMUA ARTIKEL UNTUK HALAMAN DEPAN
    public function index(Request $request)
    {
        $toko = ProfilToko::first(); // Ambil data untuk Navbar/Footer
        
        // Memulai query pengambilan artikel
        $query = Artikel::query();

        // Fitur Pencarian Artikel (Jika pengunjung mengetik di kotak pencarian)
        if ($request->has('cari') && $request->cari != '') {
            $query->where('judul', 'like', '%' . $request->cari . '%')
                  ->orWhere('konten', 'like', '%' . $request->cari . '%');
        }

        // Ambil data terbaru dan kirimkan dengan NAMA VARIABEL 'list_artikel'
        // HARUS 'list_artikel' agar cocok dengan kodingan Blade kita tadi!
        $list_artikel = $query->latest()->get();

        // Arahkan ke file resources/views/artikel.blade.php
        return view('artikel', [
            'toko' => $toko,
            'list_artikel' => $list_artikel
        ]);
    }

    // MENAMPILKAN DETAIL SATU ARTIKEL (Saat tombol "Baca Selengkapnya" diklik)
    public function show($id)
    {
        $toko = ProfilToko::first();
        
        // Cari artikel berdasarkan ID, jika tidak ada munculkan 404
        $artikel = Artikel::findOrFail($id);

        // Arahkan ke file resources/views/artikel/show.blade.php (atau terserah Anda)
        // Sementara kita arahkan ke file artikel.show (Nanti kita buat tampilannya)
        return view('artikel_detail', [
            'toko' => $toko,
            'artikel' => $artikel
        ]);
    }
}