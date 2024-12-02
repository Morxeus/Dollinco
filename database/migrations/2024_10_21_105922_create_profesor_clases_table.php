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
        Schema::create('profesor_clases', function (Blueprint $table) {
            $table->id('IDProfesorClase'); // AUTO_INCREMENT
            $table->unsignedBigInteger('IDRegistrodeClase'); // Referencia a RegistrosdeClase
            $table->string('RunProfesor', 12); // Referencia al ProfesorDirector
        
            // Definición de las claves foráneas
            $table->foreign('IDRegistrodeClase')->references('IDRegistrodeClase')->on('registrosde_clases')->onDelete('cascade');
            $table->foreign('RunProfesor')->references('RunProfesor')->on('profesor_directors')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_clases');
    }
};
