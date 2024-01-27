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
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barang');
            $table->string('nama_barang');
            $table->unsignedBigInteger('kategori_id');
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('tb_kategori')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_barang');
    }
};
