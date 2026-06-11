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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idproduct')->references('id')->on('products');
            $table->foreignId('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->string('metode_pembayaran');
            $table->integer('total_pembayaran');
            $table->integer('lama_sewa');
            $table->string('jenis_transaksi');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
