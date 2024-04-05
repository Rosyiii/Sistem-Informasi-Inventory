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
        Schema::create('e_o_q_s', function (Blueprint $table) {
            $table->string('id_eoq')->primary();
            $table->timestamps();
            $table->string('id_stok');
            $table->integer('kebutuhan_tahunan');
            $table->integer('eoq');
            $table->integer('frekuensi');
            $table->integer('jarak');
            $table->integer('safety_stok');
            $table->integer('reorder');
            $table->timestamp('date')->nullable();

            $table->foreign('id_stok')->references('id_stok')->on('stoks')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_o_q_s');
    }
};
