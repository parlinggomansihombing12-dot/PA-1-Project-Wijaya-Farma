<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class AdminArtikelController extends Controller
{
    public function index() 
    {
        $artikel = Artikel::all();
        
        // RAHASIANYA DI SINI: Harus pakai titik (admin.artikel)
        return view('admin.artikel',['list_artikel' => $artikel]);
    }
}