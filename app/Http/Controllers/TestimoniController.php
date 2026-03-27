<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\ProfilToko;

class TestimoniController extends Controller
{
    // ================= TAMPILAN USER =================
    public function index()
    {
        $toko = ProfilToko::first();

        $list_testimoni = Testimoni::latest()->get();

        return view('testimoni', compact('toko', 'list_testimoni'));
    }

    // ================= ADMIN =================
    public function adminIndex()
    {
        $testimonis = Testimoni::latest()->get();

        return view('admin.testimoni.index', compact('testimonis'));
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'komentar'       => 'required',
            'rating'         => 'required|integer|min:1|max:5',
        ]);

        Testimoni::create($request->only([
            'nama_pelanggan',
            'komentar',
            'rating'
        ]));

        return back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        Testimoni::findOrFail($id)->delete();

        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}