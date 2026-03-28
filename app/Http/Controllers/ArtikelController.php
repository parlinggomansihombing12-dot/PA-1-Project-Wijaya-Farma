<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\ProfilToko;

class ArtikelController extends Controller
{
    /**
     * 📄 LIST ARTIKEL (ADMIN SAJA)
     */
    public function index()
    {
        $toko = ProfilToko::first();
        $artikels = Artikel::latest()->get();

        return view('admin.artikel.index', [
            'toko' => $toko,
            'artikels' => $artikels
        ]);
    }

    /**
     * 🔍 DETAIL ARTIKEL (ADMIN SAJA)
     */
    public function show($id)
    {
        $toko = ProfilToko::first();
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.show', [
            'toko' => $toko,
            'artikel' => $artikel
        ]);
    }

    /**
     * ➕ SIMPAN ARTIKEL
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'penulis' => 'required|string|max:100',
        ]);

        Artikel::create([
            'judul'   => $request->judul,
            'konten'  => $request->konten,
            'penulis' => $request->penulis,
        ]);

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * ✏️ UPDATE ARTIKEL
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'penulis' => 'required|string|max:100',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * 🗑️ HAPUS ARTIKEL
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')
                         ->with('success', 'Artikel berhasil dihapus!');
    }
}