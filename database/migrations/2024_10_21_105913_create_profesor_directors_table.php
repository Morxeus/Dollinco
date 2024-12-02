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
        Schema::create('profesor_directors', function (Blueprint $table) {
            $table->string('RunProfesor', 12)->primary(); // RUT del profesor como clave primaria
            $table->string('Nombres', 100);
            $table->string('Apellidos', 100);
            $table->string('Correo', 100)->unique();
            $table->string('Telefono')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Relación con users
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_directors');
    }
};
