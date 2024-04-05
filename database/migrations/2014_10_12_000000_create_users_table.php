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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('jabatan');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('employers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
