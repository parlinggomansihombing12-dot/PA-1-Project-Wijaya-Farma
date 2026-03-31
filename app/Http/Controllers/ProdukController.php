<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Cukup mengarahkan ke halaman Kategori (yang sudah ada fitur filternya)
    public function index(Request $request)
    {
        return redirect()->route('kategori.index', $request->query());
    }
}