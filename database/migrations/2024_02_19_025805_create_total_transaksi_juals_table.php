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
        Schema::create('total_transaksi_juals', function (Blueprint $table) {
            $table->string('id_transaksi')->primary();
            $table->timestamps();
            $table->string('id_user')->nullable();
            $table->integer('total_harga')->nullable();
            $table->timestamp('date')->nullable();
            
            $table->foreign('id_user')->references('id_user')->on('employers')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_transaksi_juals');
    }
};
