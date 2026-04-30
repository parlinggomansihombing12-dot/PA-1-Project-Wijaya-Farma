<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk enkripsi password

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. KITA HAPUS KODE BAWAAN LARAVEL YANG BIKIN ERROR
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 2. KITA BUAT AKUN ADMIN BARU SECARA MANUAL (Sesuai kolom database Anda)
        User::create([
            'name'     => 'Admin Wijaya',
            'username' => 'admin',                // Kolom baru pengganti email
            'password' => Hash::make('password')  // Password default: password
        ]);

        // Catatan: Jika nanti Anda ingin menambah akun admin lain, 
        // silakan copy-paste blok User::create di atas dan ganti isinya.
    }
}