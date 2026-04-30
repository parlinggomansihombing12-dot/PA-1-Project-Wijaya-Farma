<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $fillable = [
    'nama_toko',
    'alamat',
    'no_hp', 
    'email', 
    'jam_operasional',
    'map_url'
    ];
}
