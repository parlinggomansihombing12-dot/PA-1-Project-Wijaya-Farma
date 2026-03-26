<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class AdminLayananController extends Controller
{
    /**
     * Menampilkan daftar layanan
     */
    public function index()
    {
        $layanans = Layanan::all();
        // Pastikan file view ada di resources/views/admin/layanan/index.blade.php
        return view('admin.layanan.index', compact('layanans'));
    }

    /**
     * Menyimpan layanan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'    => 'required',
            'ikon'         => 'required' // Contoh: 'fa-stethoscope'
        ]);

        // Mencegah error MassAssignment dengan hanya mengambil data yang diperlukan
        Layanan::create($request->only(['nama_layanan', 'deskripsi', 'ikon']));

        return redirect()->back()->with('success', 'Layanan berhasil ditambah');
    }

    /**
     * Memperbarui data layanan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi'    => 'required',
            'ikon'         => 'required'
        ]);

        $layanan = Layanan::findOrFail($id);
        
        // Update hanya field yang diizinkan
        $layanan->update($request->only(['nama_layanan', 'deskripsi', 'ikon']));

        return redirect()->back()->with('success', 'Layanan berhasil diupdate');
    }

    /**
     * Menghapus layanan
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus');
    }
}