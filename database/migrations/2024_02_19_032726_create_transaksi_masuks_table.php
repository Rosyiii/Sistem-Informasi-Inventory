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
        Schema::create('transaksi_masuks', function (Blueprint $table) {
            $table->string('id_transaksi_masuk')->primary();
            $table->timestamps();
            $table->string('id_stok');
            $table->string('id_supplier')->nullable();
            $table->string('id_user')->nullable();
            $table->integer('jml_stok');
            $table->integer('harga_beli');
            $table->integer('harga_total');
            $table->integer('biaya_pesan');
            $table->integer('waktu_antar');
            $table->timestamp('date')->nullable();

            $table->foreign('id_stok')->references('id_stok')->on('stoks')->onUpdate('cascade');
            $table->foreign('id_supplier')->references('id_supplier')->on('suppliers')->onUpdate('cascade');
            $table->foreign('id_user')->references('id_user')->on('employers')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_masuks');
    }
};
