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
    Schema::create('penyakit_ciri_detail', function (Blueprint $table) {
      $table->increments('id_penyakit_ciri_detail');

      // COLUMN FOREIGN KEY
      $table->integer('id_penyakit')->unsigned()->nullable();
      $table->integer('id_ciri_penyakit')->unsigned()->nullable();

      // RELATION FOREIGN KEY
      $table->foreign('id_penyakit')->references('id_penyakit')->on('penyakit')->onDelete('cascade');
      $table->foreign('id_ciri_penyakit')->references('id_ciri_penyakit')->on('ciri_penyakit')->onDelete('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('penyakit_ciri_detail');
  }
};
