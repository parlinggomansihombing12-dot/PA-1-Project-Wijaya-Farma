<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\ProfilToko;
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    // ================= INDEX =================
    public function index()
    {
        $toko = ProfilToko::first();
        $testimonis = Testimoni::latest()->get();

        return view('admin.Testimoni.index', compact('toko', 'testimonis'));
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

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'komentar'       => 'required',
            'rating'         => 'required|integer|min:1|max:5',
        ]);

        $testimoni = Testimoni::findOrFail($id);

        $testimoni->update($request->only([
            'nama_pelanggan',
            'komentar',
            'rating'
        ]));

        return back()->with('success', 'Testimoni berhasil diupdate!');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        Testimoni::findOrFail($id)->delete();

        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}