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
            $table->id('IDCursoAsignatura'); // AUTO_INCREMENT
            $table->unsignedBigInteger('IDCurso'); // Referencia a Curso
            $table->unsignedBigInteger('IDAsignatura'); // Referencia a Asignatura
            $table->unsignedBigInteger('NumeroMatricula');// Referencia a Mallas

            // Claves foráneas
            $table->foreign('IDCurso')->references('IDCurso')->on('cursos')->onDelete('cascade');
            $table->foreign('IDAsignatura')->references('IDAsignatura')->on('asignaturas')->onDelete('cascade');
            $table->foreign('NumeroMatricula')->references('NumeroMatricula')->on('matriculas')->onDelete('cascade');

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
