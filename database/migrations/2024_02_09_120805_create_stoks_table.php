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
        Schema::create('stoks', function (Blueprint $table) {
            $table->string('id_stok')->primary();
            $table->timestamps();
            $table->string('id_supplier');
            $table->text('nama');
            $table->enum('satuan', ['Pack', 'Meter', 'Unit']);
            $table->integer('jml_stok');
            $table->integer('harga_beli');
            $table->integer('biaya_pesan');
            $table->integer('waktu_antar');
            $table->integer('biaya_simpan');
            $table->integer('harga_jual');

            $table->foreign('id_supplier')->references('id_supplier')->on('suppliers')->onUpdate('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
