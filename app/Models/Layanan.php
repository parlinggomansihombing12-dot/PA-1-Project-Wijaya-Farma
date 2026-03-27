<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // ✅ Nama tabel (opsional, tapi aman)
    protected $table = 'layanans';

    // ✅ Field yang boleh diisi
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'ikon'
    ];

    // ✅ Default value (optional biar tidak null)
    protected $attributes = [
        'ikon' => '💊'
    ];
}