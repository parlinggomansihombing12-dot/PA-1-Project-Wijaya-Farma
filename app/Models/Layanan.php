<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'foto' // Pastikan ini ada
    ];

    /**
     * Opsional: Accessor untuk mempermudah pemanggilan URL foto.
     * Dengan ini, Anda cukup memanggil $layanan->foto_url di Blade.
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        
        // Kembalikan gambar default jika foto kosong
        return asset('images/default-layanan.png'); 
    }
}