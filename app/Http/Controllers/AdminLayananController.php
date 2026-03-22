<?php

namespace App\Http\Controllers; // Pastikan ini Http, bukan Htpp

use App\Models\Layanan;
use Illuminate\Http\Request;

class AdminLayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'ikon' => 'required' // Misal: fa-pills
        ]);

        Layanan::create($request->all());
        return redirect()->back()->with('success', 'Layanan berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());
        return redirect()->back()->with('success', 'Layanan berhasil diupdate');
    }

    public function destroy($id)
    {
        Layanan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Layanan berhasil dihapus');
    }
}