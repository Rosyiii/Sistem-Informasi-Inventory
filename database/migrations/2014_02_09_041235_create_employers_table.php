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
        Schema::create('employers', function (Blueprint $table) {
            $table->string('id_user')->primary();
            $table->timestamps();
            $table->string('nama');
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir')->nullable();
            $table->text('ijazah_terakhir');
            $table->enum('jabatan', ['Owner', 'Store Manager', 'Karyawan']);
            $table->string('username')->unique();
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
