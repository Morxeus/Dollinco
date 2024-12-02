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
        Schema::create('apoderados', function (Blueprint $table) {
            $table->string('RunApoderado', 12)->primary();
            $table->string('Nombres', 50);
            $table->string('Apellidos', 50);
            $table->string('Correo', 100)->unique();
            $table->integer('Telefono')->nullable();
            $table->string('Genero', 50)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apoderados');
    }
};
