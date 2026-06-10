<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ActivityLog;

class LogUserActivity
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if (auth()->check()) {
            if (str_contains($request->path(), 'admin')) {
                ActivityLog::create([
                    'user_id' => auth()->id(),
                    'activity' => $this->getActivityDescription($request),
                    'ip_address' => $request->ip(),
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                ]);
            }
        }
    }

    private function getActivityDescription($request)
    {
        $path = $request->path();
        $method = $request->method();

        $activities = [
            'admin/dashboard' => 'Mengakses halaman dashboard',
            'admin/produk' => 'Mengakses halaman kelola produk',
            'admin/produk/create' => 'Membuka form tambah produk',
            'admin/kategori' => 'Mengakses halaman kelola kategori',
            'admin/layanan' => 'Mengakses halaman kelola layanan',
            'admin/artikel' => 'Mengakses halaman kelola artikel',
            'admin/testimoni' => 'Mengakses halaman kelola testimoni',
            'admin/profil-toko' => 'Mengakses halaman profil toko',
            'admin/kontak' => 'Mengakses halaman kelola kontak',
        ];

        foreach ($activities as $route => $description) {
            if ($path == $route || str_starts_with($path, $route . '/')) {
                return $description;
            }
        }

        if ($method == 'POST') return 'Menambahkan data baru';
        if ($method == 'PUT' || $method == 'PATCH') return 'Mengupdate data';
        if ($method == 'DELETE') return 'Menghapus data';

        return 'Mengakses halaman: ' . $path;
    }
}