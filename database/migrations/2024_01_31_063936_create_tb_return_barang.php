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
        Schema::create('tb_return_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('alasan');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('barang_id')->references('id')->on('tb_barang')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('tb_customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_return_barang');
    }
};
