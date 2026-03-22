<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Wajib dipanggil

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // Ambil semua data obat

        // Tampilkan ke view admin/produk.blade.php
        return view('admin.produk', ['list_produk' => $produk]);
    }
}