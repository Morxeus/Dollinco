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
        Schema::create('mallas', function (Blueprint $table) {
            $table->id('IdMalla'); // AUTO_INCREMENT
            $table->string('NombreMalla', 50);
            $table->unsignedBigInteger('IdCurso'); // Relación con el curso
            $table->unsignedBigInteger('IdAsignatura'); // Relación con la asignatura
            $table->unsignedBigInteger('NumeroMatricula'); // Relación con matrícula
            $table->string('RunProfesor', 12); // Relación con el profesor
    
            // Claves foráneas
            $table->foreign('IdCurso')->references('IdCurso')->on('cursos')->onDelete('restrict');
            $table->foreign('IdAsignatura')->references('IdAsignatura')->on('asignaturas')->onDelete('restrict');
            $table->foreign('NumeroMatricula')->references('NumeroMatricula')->on('matriculas')->onDelete('restrict');
            $table->foreign('RunProfesor')->references('RunProfesor')->on('profesor_directors')->onDelete('restrict');
    
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mallas');
    }
};
