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
        Schema::create('reunions', function (Blueprint $table) {
            $table->id('IdReunion'); // AUTO_INCREMENT
            $table->string('TipoReunion', 50); // Tipo de reunión
            $table->dateTime('FechaInicio'); // Fecha y hora de inicio
            $table->dateTime('FechaFin'); // Fecha y hora de fin
            $table->string('DescripcionReunion', 255)->nullable(); // Descripción opcional
            $table->string('RunProfesor', 12); // Referencia a profesor
    
            // Clave foránea
            $table->foreign('RunProfesor')->references('RunProfesor')->on('profesor_directors')->onDelete('restrict');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunions');
    }
};
