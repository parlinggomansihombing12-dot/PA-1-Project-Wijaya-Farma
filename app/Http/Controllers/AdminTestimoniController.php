<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;   // Panggil Model Testimoni
use App\Models\ProfilToko;  // Untuk data Navbar
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $testimonis = Testimoni::latest()->get();

        return view('admin.testimoni.index', [
            'toko' => $toko,
            'testimonis' => $testimonis,
            'title' => 'Kelola Testimoni Pasien'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'pesan'       => 'required',
            'rating'      => 'required|integer|min:1|max:5',
        ]);

        // Menggunakan only() agar aman dari error _token
        Testimoni::create($request->only(['nama_pasien', 'pesan', 'rating']));

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}