<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_tokos', function (Blueprint $table) {
            // CEK DULU: Jika kolom jam_operasional BELUM ADA di database, baru buatkan!
            if (!Schema::hasColumn('profil_tokos', 'jam_operasional')) {
                $table->string('jam_operasional')->nullable();
            }

            // CEK DULU: Jika kolom map_url BELUM ADA di database, baru buatkan!
            if (!Schema::hasColumn('profil_tokos', 'map_url')) {
                $table->text('map_url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('profil_tokos', function (Blueprint $table) {
            // Saat di-rollback, hapus HANYA jika kolomnya memang ada
            if (Schema::hasColumn('profil_tokos', 'jam_operasional')) {
                $table->dropColumn('jam_operasional');
            }
            if (Schema::hasColumn('profil_tokos', 'map_url')) {
                $table->dropColumn('map_url');
            }
        });
    }
};