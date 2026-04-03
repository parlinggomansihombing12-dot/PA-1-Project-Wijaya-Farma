<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko;

class AdminProfilTokoController extends Controller
{
    // 1. Tampilkan Halaman Pengaturan Profil
    public function index()
    {
        // Ambil data profil pertama (karena profil toko biasanya hanya 1 baris di database)
        $toko = ProfilToko::first();
        
        // Pastikan ini mengarah ke file resources/views/admin/profil.blade.php
        return view('admin.profil', compact('toko'));
    }

    // 2. Proses Simpan/Update Profil
    public function update(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat'    => 'required|string',
            'no_hp'     => 'required|string|max:20',
            'email'     => 'nullable|email|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        $toko = ProfilToko::first();

        // Jika belum ada data sama sekali di database, buat baru
        if (!$toko) {
            ProfilToko::create($request->all());
        } else {
            // Jika sudah ada, update data lama
            $toko->update($request->all());
        }

        return redirect()->back()->with('success', 'Profil Toko berhasil diperbarui!');
    }
}