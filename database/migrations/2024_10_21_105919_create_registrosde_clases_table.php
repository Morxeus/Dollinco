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
        Schema::create('registrosde_clases', function (Blueprint $table) {
            $table->id('IDRegistrodeClase'); // AUTO_INCREMENT
            $table->unsignedBigInteger('IDCursoAsignatura'); // Referencia a mallas
            $table->unsignedBigInteger('NumeroMatricula'); // Referencia a Matricula
            $table->unsignedBigInteger('IDEvaluacion'); // Referencia a Evaluaciones
            $table->unsignedBigInteger('IDAsistencia'); // Referencia a Asistencia
            $table->unsignedBigInteger('IDAnotacion'); // Referencia a Anotaciones
        
            // Definición de las claves foráneas
            $table->foreign('IDCursoAsignatura')->references('IDCursoAsignatura')->on('mallas')->onDelete('cascade');
            $table->foreign('NumeroMatricula')->references('NumeroMatricula')->on('matriculas')->onDelete('cascade');
            $table->foreign('IDEvaluacion')->references('IDEvaluacion')->on('evaluacions')->onDelete('cascade');
            $table->foreign('IDAsistencia')->references('IDAsistencia')->on('asistencias')->onDelete('cascade');
            $table->foreign('IDAnotacion')->references('IDAnotacion')->on('anotacions')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrosde_clases');
    }
};
