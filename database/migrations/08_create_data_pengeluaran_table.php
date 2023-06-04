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
    Schema::create('data_pengeluaran', function (Blueprint $table) {
      $table->increments('id_pengeluaran');
      $table->string('jenis_pengeluaran');
      $table->integer('jumlah_pengeluaran');
      $table->date('tanggal_pengeluaran');
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
    Schema::dropIfExists('data_pengeluaran');
  }
};
