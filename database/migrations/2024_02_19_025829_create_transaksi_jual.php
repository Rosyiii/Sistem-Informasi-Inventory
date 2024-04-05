<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('transaksi_juals', function (BluePrint $table){
        $table->id();
        $table->timestamps();
        $table->string('id_transaksi');
        $table->string('id_stok');
        $table->integer('jumlah');
        $table->integer('harga_satuan');
        $table->integer('total_harga');
        $table->timestamp('tanggal')->nullable();

        $table->foreign('id_transaksi')->references('id_transaksi')->on('total_transaksi_juals')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('id_stok')->references('id_stok')->on('stoks')->onUpdate('cascade');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('transaksi_juals');
    }
};
