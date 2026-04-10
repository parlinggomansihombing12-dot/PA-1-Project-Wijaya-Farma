<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tokos', function (Blueprint $table) {
        $table->id();
        $table->string('nama_toko')->nullable();
        $table->text('alamat')->nullable();
        $table->string('no_hp')->nullable();
        $table->string('email')->nullable();
        $table->text('jam_operasional')->nullable(); // Senin - Sabtu: 08:00...
        $table->text('map_url')->nullable(); // Link Embed Google Maps
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokos');
    }
};
