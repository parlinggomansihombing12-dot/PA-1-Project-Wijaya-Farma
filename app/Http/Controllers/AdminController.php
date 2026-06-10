<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_produk = \App\Models\Produk::count();
        $total_kategori = \App\Models\Kategori::count();
        $total_layanan = \App\Models\Layanan::count();
        $total_artikel = \App\Models\Artikel::count();
        $total_testimoni = \App\Models\Testimoni::count();
        
        // Ambil 10 aktivitas terbaru
        $recentActivities = ActivityLog::with('user')
            ->latest()
            ->take(10)
            ->get();
        
        return view('admin.dashboard', compact(
            'total_produk', 
            'total_kategori', 
            'total_layanan', 
            'total_artikel', 
            'total_testimoni', 
            'recentActivities'
        ));
    }
}