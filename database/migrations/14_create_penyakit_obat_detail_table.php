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
    Schema::create('penyakit_obat_detail', function (Blueprint $table) {
      $table->increments('id_penyakit_obat_detail');

      // COLUMN FOREIGN KEY
      $table->integer('id_penyakit')->nullable()->unsigned();
      $table->integer('id_obat_penyakit')->nullable()->unsigned();

      // RELATION FOREIGN KEY
      $table->foreign('id_penyakit')->references('id_penyakit')->on('penyakit');
      $table->foreign('id_obat_penyakit')->references('id_obat_penyakit')->on('obat_penyakit');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('penyakit_obat_detail');
  }
};
