<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;     // Panggil Model Layanan
use App\Models\ProfilToko;  // Panggil Model Profil Toko untuk Navbar

class LayananController extends Controller
{
    /**
     * Menampilkan daftar layanan (Tampilan Tabel Gambar 1)
     */
    public function index()
    {
        $toko = ProfilToko::first();
        $layanan = Layanan::all();

        return view('layanan', [
            'toko' => $toko,
            'list_layanan' => $layanan,
            'title' => 'Data Layanan Medis'
        ]);
    }

    /**
     * Menyimpan layanan baru (Tombol Tambah Produk Baru)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga'        => 'required|numeric',
            'stok'         => 'required|integer', // Jika layanan memiliki kuota/limit
        ]);

        Layanan::create($request->all());

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    /**
     * Memperbarui data layanan (Tombol Edit)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga'        => 'required|numeric',
            'stok'         => 'required|integer',
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui!');
    }

    /**
     * Menghapus layanan (Tombol Delete)
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }
}