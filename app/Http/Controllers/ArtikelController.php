<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\ProfilToko;

class ArtikelController extends Controller
{
    public function index()
    {
        $toko = ProfilToko::first();
        $artikel = Artikel::latest()->get(); // Ambil artikel terbaru
        return view('artikel', ['toko' => $toko, 'list_artikel' => $artikel]);
    }
}