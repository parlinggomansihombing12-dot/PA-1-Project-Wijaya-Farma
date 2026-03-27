<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\ProfilToko;

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel (Admin & User)
     */
    public function index()
    {
        $toko = ProfilToko::first();
        $artikels = Artikel::latest()->get();

        // ✅ JIKA ADMIN
        if (request()->is('admin/*')) {
            return view('admin.artikel.index', [
                'artikels' => $artikels
            ]);
        }

        // ✅ JIKA USER (FRONTEND)
        return view('artikel', [
            'toko' => $toko,
            'list_artikel' => $artikels,
            'title' => 'Artikel'
        ]);
    }

    /**
     * ✅ DETAIL ARTIKEL
     */
    public function show($id)
    {
        $toko = ProfilToko::first();
        $artikel = Artikel::findOrFail($id);

        return view('artikel.show', [
            'toko' => $toko,
            'artikel' => $artikel,
            'title' => $artikel->judul
        ]);
    }

    /**
     * Menyimpan artikel baru (ADMIN)
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

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Update artikel (ADMIN)
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

        return redirect()->back()->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Hapus artikel (ADMIN)
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->back()->with('success', 'Artikel berhasil dihapus!');
    }
}