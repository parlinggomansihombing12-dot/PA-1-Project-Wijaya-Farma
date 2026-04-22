<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriArtikel;

class AdminKategoriArtikelController extends Controller
{
    public function index() {
        $kategoris = KategoriArtikel::latest()->get();
        return view('admin.KategoriArtikel.index', compact('kategoris'));
    }

    public function store(Request $request) {
        $request->validate(['nama_kategori' => 'required|string|max:255']);
        KategoriArtikel::create($request->all());
        return back()->with('success', 'Kategori Artikel berhasil ditambahkan!');
    }

    public function destroy($id) {
        KategoriArtikel::findOrFail($id)->delete();
        return back()->with('success', 'Kategori Artikel dihapus!');
    }
}