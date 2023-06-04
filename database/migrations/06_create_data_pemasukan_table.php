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
        Schema::create('data_pemasukan', function (Blueprint $table) {
            $table->increments('id_pemasukan');
            $table->string('jenis_pemasukan');
            $table->integer('jumlah_pemasukan');
            $table->date('tanggal_pemasukan');
            $table->string('username_peternak');
            $table->unsignedInteger('id_kandang');
            $table->foreign('username_peternak')->references('username')->on('akun_peternak')->onDelete('cascade');
            $table->foreign('id_kandang')->references('id_kandang')->on('kandang')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pemasukan');
    }
};
