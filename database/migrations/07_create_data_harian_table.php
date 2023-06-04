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
        Schema::create('data_harian', function (Blueprint $table) {
            $table->increments('id_harian');
            $table->date('tanggal_pengukuran');
            $table->float('bobot_ternak');
            $table->unsignedInteger('id_kandang');
            $table->foreign('id_kandang')->references('id_kandang')->on('kandang')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_harian');
    }
};
