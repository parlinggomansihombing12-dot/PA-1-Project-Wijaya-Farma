<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('toko', function (Blueprint $table) {
            $table->string('maps_link')->nullable()->after('jam_operasional');
        });
    }

    public function down()
    {
        Schema::table('toko', function (Blueprint $table) {
            $table->dropColumn('maps_link');
        });
    }
};