<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProfilToko;

class ProdukController extends Controller
{
    // 🔍 TAMPIL DATA
    public function index()
    {
        $toko = ProfilToko::first();
        $produk = Produk::all();

        return view('produk.index', [
            'toko' => $toko,
            'list_produk' => $produk
        ]);
    }

    // ➕ FORM TAMBAH
    public function create()
    {
        return view('produk.create');
    }

    // 💾 SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil ditambahkan');
    }

    // ✏️ FORM EDIT
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // 🔄 UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil diupdate');
    }

    // 🗑️ HAPUS DATA
    public function destroy($id)
    {
        Produk::destroy($id);

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil dihapus');
    }
}