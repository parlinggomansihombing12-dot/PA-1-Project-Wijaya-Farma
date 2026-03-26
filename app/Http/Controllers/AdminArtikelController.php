<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ProfilToko;
use Illuminate\Http\Request;

class AdminArtikelController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $artikels = Artikel::latest()->get();
        return view('admin.artikel.index', compact('toko', 'artikels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'penulis' => 'required|string|max:100',
        ]);

        // Menggunakan only() untuk menghindari error _token seperti sebelumnya
        Artikel::create($request->only(['judul', 'konten', 'penulis']));

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'penulis' => 'required|string|max:100',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->only(['judul', 'konten', 'penulis']));

        return redirect()->back()->with('success', 'Artikel berhasil diupdate');
    }

    public function destroy($id)
    {
        Artikel::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Artikel berhasil dihapus');
    }
}