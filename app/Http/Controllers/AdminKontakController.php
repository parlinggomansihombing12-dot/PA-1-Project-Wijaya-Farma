<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko;

class AdminKontakController extends Controller
{
    // Menampilkan halaman form pengaturan kontak
    public function index()
    {
        $toko = ProfilToko::first(); // Mengambil data profil toko pertama
        return view('admin.kontak.index', compact('toko'));
    }

    // Menyimpan perubahan data kontak
    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'jam_operasional' => 'required',
            'map_url' => 'required',
        ]);

        $toko = ProfilToko::first();
        
        // Jika data belum ada di database, buat baru. Jika sudah ada, update.
        if (!$toko) {
            $toko = new ProfilToko();
        }

        $toko->alamat = $request->alamat;
        $toko->no_hp = $request->no_hp;
        $toko->email = $request->email;
        $toko->jam_operasional = $request->jam_operasional;
        $toko->map_url = $request->map_url;
        $toko->save();

        return redirect()->back()->with('success', 'Informasi Kontak berhasil diperbarui!');
    }
}