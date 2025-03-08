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
        Schema::create('rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->string('solusi', 255)->nullable();
            $table->timestamps();
        });
        
        Schema::create('klasifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foto_id');
            $table->foreign('foto_id')->references('id')->on('foto_mata')->onDelete('cascade');
            $table->unsignedBigInteger('rekomendasi_id')->nullable();
            $table->foreign('rekomendasi_id')->references('id')->on('rekomendasi')->onDelete('set null');
            $table->string('hasil', 255)->nullable();
            $table->float('akurasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi');
        Schema::dropIfExists('rekomendasi');
    }
};
