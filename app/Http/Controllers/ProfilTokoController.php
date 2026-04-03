<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilToko; // <-- PASTIKAN NAMA MODEL SESUAI

class ProfilTokoController extends Controller
{
    public function index()
    {
        // AMBIL DATA PERTAMA
        $toko = ProfilToko::first(); 

        // KIRIM KE VIEW
        return view('profil', compact('toko'));
    }
}