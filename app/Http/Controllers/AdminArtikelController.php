<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class AdminArtikelController extends Controller
{
   public function index() 
    {
        $artikel = \App\Models\Artikel::all();
        
        // PERHATIKAN: Ubah 'list_artikel' menjadi 'artikels' sesuai permintaan teman Anda
        return view('admin.Artikel.index', ['artikels' => $artikel]);
    }
}