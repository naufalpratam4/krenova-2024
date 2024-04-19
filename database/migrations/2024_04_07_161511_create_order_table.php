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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nomor_order');
            $table->date('tgl_order');
            $table->date('tgl_bayar');
            $table->string('payment_method');
            $table->bigInteger('jml_dana');
            $table->unsignedBigInteger('produk_id');
            $table->bigInteger('kuantitas');
            $table->text('catatan');
            $table->string('status');
            $table->string('keterangan_status');
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
