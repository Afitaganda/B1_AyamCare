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
        Schema::create('komentar', function (Blueprint $table) {
            $table->increments('id_komentar');
            
            $table->string('deskripsi');

            // Foreign Key Column
            $table->integer('id_peternak')->unsigned();
            $table->integer('id_artikel')->unsigned();

            // Foreign Key Relation
            $table->foreign('id_peternak')->references('id_peternak')->on('akun_peternak')->onDelete('cascade');
            $table->foreign('id_artikel')->references('id_artikel')->on('artikel')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar');
    }
};
