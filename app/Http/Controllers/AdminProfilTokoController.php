<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko;
use Illuminate\Support\Facades\File;

class AdminProfilTokoController extends Controller
{
    // 1. TAMPILKAN HALAMAN FORM PROFIL
    public function index()
    {
        $toko = ProfilToko::first();
        return view('admin.profil', compact('toko'));
    }

    // 2. PROSES SIMPAN/UPDATE DATA PROFIL TOKO & PEMILIK
    public function update(Request $request)
    {
        // Validasi semua input (termasuk kolom pemilik yang baru)
        $request->validate([
            'nama_toko'          => 'required|string|max:255',
            'alamat'             => 'required|string',
            'no_hp'              => 'required|string|max:20',
            'email'              => 'nullable|email|max:255',
            'deskripsi'          => 'nullable|string',
            'sejarah'            => 'nullable|string',
            'visi'               => 'nullable|string',
            'misi'               => 'nullable|string',
            'foto_toko'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072', // Foto Toko
            
            // Validasi Data Pemilik
            'nama_pemilik'       => 'nullable|string|max:255',
            'pendidikan_pemilik' => 'nullable|string|max:255',
            'pengalaman_pemilik' => 'nullable|string',
            'foto_pemilik'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072'  // Foto Wajah Pemilik
        ]);

        $toko = ProfilToko::first();
        if (!$toko) { $toko = new ProfilToko(); } // Jika belum ada data, buat baru

        // Siapkan variabel untuk menyimpan nama foto lama (jika tidak diubah)
        $nama_foto_toko    = $toko->foto_toko;
        $nama_foto_pemilik = $toko->foto_pemilik; 

        // ============================================================
        // A. PROSES UPLOAD FOTO TOKO (Hero Image)
        // ============================================================
        if ($request->hasFile('foto_toko')) {
            // Hapus foto toko yang lama dari komputer (jika ada)
            if ($nama_foto_toko && File::exists(public_path('images/profil/' . $nama_foto_toko))) {
                File::delete(public_path('images/profil/' . $nama_foto_toko));
            }
            
            // Simpan foto toko yang baru
            $file_toko = $request->file('foto_toko');
            // Beri label 'toko_' agar tidak tertukar
            $nama_foto_toko = time() . '_toko_' . $file_toko->getClientOriginalName();
            $file_toko->move(public_path('images/profil'), $nama_foto_toko);
        }

        // ============================================================
        // B. PROSES UPLOAD FOTO PEMILIK (Apoteker)
        // ============================================================
        if ($request->hasFile('foto_pemilik')) {
            // Hapus foto pemilik yang lama dari komputer (jika ada)
            if ($nama_foto_pemilik && File::exists(public_path('images/profil/' . $nama_foto_pemilik))) {
                File::delete(public_path('images/profil/' . $nama_foto_pemilik));
            }
            
            // Simpan foto pemilik yang baru
            $file_pemilik = $request->file('foto_pemilik');
            // Beri label 'pemilik_' agar tidak tertukar
            $nama_foto_pemilik = time() . '_pemilik_' . $file_pemilik->getClientOriginalName();
            $file_pemilik->move(public_path('images/profil'), $nama_foto_pemilik);
        }

        // ============================================================
        // C. SIMPAN SEMUA DATA KE DATABASE
        // ============================================================
        $toko->nama_toko          = $request->nama_toko;
        $toko->alamat             = $request->alamat;
        $toko->no_hp              = $request->no_hp;
        $toko->email              = $request->email;
        $toko->deskripsi          = $request->deskripsi;
        $toko->sejarah            = $request->sejarah;
        $toko->visi               = $request->visi;
        $toko->misi               = $request->misi;
        $toko->foto_toko          = $nama_foto_toko;    // Simpan nama foto toko
        
        // Simpan Data Pemilik
        $toko->nama_pemilik       = $request->nama_pemilik;
        $toko->pendidikan_pemilik = $request->pendidikan_pemilik;
        $toko->pengalaman_pemilik = $request->pengalaman_pemilik;
        $toko->foto_pemilik       = $nama_foto_pemilik; // Simpan nama foto pemilik wajah
        
        // Eksekusi penyimpanan ke tabel 'profil_tokos'
        $toko->save();

        return redirect()->back()->with('success', 'Profil Toko & Data Apoteker berhasil diperbarui!');
    }
}