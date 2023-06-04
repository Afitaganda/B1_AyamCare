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
    Schema::create('kandang', function (Blueprint $table) {
      $table->increments('id_kandang');
      $table->string('nama_kandang');
      $table->integer('jumlah_populasi');
      $table->integer('usia_ternak');
      $table->date('tanggal_masuk_ternak');
      $table->boolean('status_kandang')->default(true);
      $table->char('username_peternak', 10);
      $table->foreign('username_peternak')->references('username')->on('akun_peternak')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('kandang');
  }
};
