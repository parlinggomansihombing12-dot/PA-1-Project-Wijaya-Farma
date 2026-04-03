<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilToko extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'profil_tokos';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_toko',
        'foto_toko',
        'sejarah',
        'jam_operasional',
        'nama_pemilik',
        'foto_pemilik',
        'pendidikan',
        'pengalaman',
    ];
}