<?php
namespace App\Http\Controllers;
use App\Models\Testimoni;

class AdminTestimoniController extends Controller
{
    public function index() {
        $testimoni = Testimoni::all();
        return view('admin.testimoni', ['list_testimoni' => $testimoni]);
    }
}