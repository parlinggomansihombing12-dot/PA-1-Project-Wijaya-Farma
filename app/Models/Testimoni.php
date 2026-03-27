<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    // Nama tabel (opsional tapi aman)
    protected $table = 'testimonis';

    // Field yang boleh diisi
    protected $fillable = [
        'nama_pelanggan',
        'komentar',
        'rating'
    ];

    // Default value (biar tidak null)
    protected $attributes = [
        'rating' => 5
    ];
}