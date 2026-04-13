<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko;

class KontakController extends Controller
{
    public function index()
    {
        // 1. Mengambil data toko dari database
        $toko = ProfilToko::first();

        // 2. Mengirimkan data tersebut ke halaman 'kontak.blade.php'
        return view('kontak', compact('toko'));
    }
}