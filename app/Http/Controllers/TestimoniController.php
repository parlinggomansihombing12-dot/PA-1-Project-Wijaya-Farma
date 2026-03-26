<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;   // Panggil Model Testimoni
use App\Models\ProfilToko;  // Panggil Model Profil Toko untuk Navbar

class TestimoniController extends Controller
{
    /**
     * Menampilkan daftar testimoni (Tampilan Tabel Gambar 1)
     */
    public function index()
    {
        $toko = ProfilToko::first();
        
        // Ambil semua data testimoni, urutkan dari yang terbaru
        $testimoni = Testimoni::latest()->get();

        return view('testimoni', [
            'toko' => $toko,
            'list_testimoni' => $testimoni,
            'title' => 'Kelola Testimoni Pasien' // Judul untuk heading
        ]);
    }

    /**
     * Menyimpan testimoni baru (Aksi tombol biru + Tambah Baru)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'pesan'       => 'required',
            'rating'      => 'required|integer|min:1|max:5',
        ]);

        Testimoni::create([
            'nama_pasien' => $request->nama_pasien,
            'pesan'       => $request->pesan,
            'rating'      => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Menghapus testimoni (Tombol Delete Merah)
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}