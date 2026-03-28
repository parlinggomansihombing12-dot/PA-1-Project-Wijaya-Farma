<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // Untuk Halaman Depan (Landing Page)
    public function welcome() {
        $layanans = Layanan::all();
        return view('welcome', compact('layanans'));
    }

    // CRUD Admin
    public function index() {
        $layanans = Layanan::latest()->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create() {
        return view('admin.layanan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'ikon' => 'required',
        ]);
        Layanan::create($request->all());
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(Layanan $layanan) {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan) {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'ikon' => 'required',
        ]);
        $layanan->update($request->all());
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(Layanan $layanan) {
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus');
    }
}