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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('kd_produk');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->string('lokasi');
            $table->string('ukuran');
            $table->string('gambar');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('penjual_id');

            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('CASCADE');
            $table->foreign('penjual_id')->references('id')->on('users')->where('role_id', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
