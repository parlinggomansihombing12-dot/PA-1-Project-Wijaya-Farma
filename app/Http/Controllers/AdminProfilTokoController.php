<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko;
use Illuminate\Support\Facades\File;

class AdminProfilTokoController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        return view('admin.profil', compact('toko'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat'    => 'required|string',
            'no_hp'     => 'required|string|max:20',
            'email'     => 'nullable|email|max:255',
            'deskripsi' => 'nullable|string',
            'sejarah'   => 'nullable|string',
            'visi'      => 'nullable|string',
            'misi'      => 'nullable|string',
            'foto_toko' => 'nullable|image|mimes:jpeg,png,jpg|max:3072' // Max 3MB
        ]);

        $toko = ProfilToko::first();
        if (!$toko) { $toko = new ProfilToko(); } // Buat baru jika kosong

        $nama_foto = $toko->foto_toko;

        // Jika Admin Upload Foto Toko Baru
        if ($request->hasFile('foto_toko')) {
            // Hapus foto lama jika ada
            if ($nama_foto && File::exists(public_path('images/profil/' . $nama_foto))) {
                File::delete(public_path('images/profil/' . $nama_foto));
            }
            // Simpan foto baru
            $file = $request->file('foto_toko');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/profil'), $nama_foto);
        }

        // Simpan semua data
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat    = $request->alamat;
        $toko->no_hp     = $request->no_hp;
        $toko->email     = $request->email;
        $toko->deskripsi = $request->deskripsi;
        $toko->sejarah   = $request->sejarah;
        $toko->visi      = $request->visi;
        $toko->misi      = $request->misi;
        $toko->foto_toko = $nama_foto;
        $toko->save();

        return redirect()->back()->with('success', 'Profil Toko & Foto berhasil diperbarui!');
    }
}