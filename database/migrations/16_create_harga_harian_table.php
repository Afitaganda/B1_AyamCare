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
    Schema::create('harga_harian', function (Blueprint $table) {
      $table->increments('id_harga_harian');
      $table->date('tanggal');
      $table->integer('harga_ayam_boiler');
      $table->string('daerah')->default('Jember');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('harga_harian');
  }
};
