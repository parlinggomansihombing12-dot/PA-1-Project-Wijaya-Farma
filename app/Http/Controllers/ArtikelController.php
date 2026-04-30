<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\ProfilToko;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $toko = ProfilToko::first();
        $query = Artikel::query();

        // 1. Jika ada pencarian TEKS
        if ($request->has('cari') && $request->cari != '') {
            $query->where('judul', 'like', '%' . $request->cari . '%');
        }

        // 2. Jika ada pencarian KATEGORI (Klik Sidebar)
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_artikel', $request->kategori);
        }

        $list_artikel = $query->latest()->get();

        // 3. Ambil daftar Kategori Unik yang ada di database untuk Sidebar
        // (Ini sangat canggih! Hanya menampilkan kategori yang punya artikel)
        $kategori_unik = Artikel::select('kategori_artikel')->distinct()->get();

        return view('artikel', [
            'toko' => $toko,
            'list_artikel' => $list_artikel,
            'kategori_unik' => $kategori_unik,
            'kategori_aktif' => $request->kategori
        ]);
    }

    public function show($id)
    {
        $toko = ProfilToko::first();
        $artikel = Artikel::findOrFail($id);
        return view('artikel_detail', compact('toko', 'artikel'));
    }
}