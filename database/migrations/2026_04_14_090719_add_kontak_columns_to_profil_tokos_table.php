<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_tokos', function (Blueprint $table) {
            // MENAMBAHKAN 2 KOLOM BARU INI KE TABEL
            $table->string('jam_operasional')->nullable();
            $table->text('map_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profil_tokos', function (Blueprint $table) {
            $table->dropColumn(['jam_operasional', 'map_url']);
        });
    }
};