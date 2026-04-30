<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('profil_tokos', function (Blueprint $table) {
        $table->string('nama_pemilik')->nullable();
        $table->string('foto_pemilik')->nullable();
        $table->string('pendidikan_pemilik')->nullable();
        $table->text('pengalaman_pemilik')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_tokos', function (Blueprint $table) {
            //
        });
    }
};
