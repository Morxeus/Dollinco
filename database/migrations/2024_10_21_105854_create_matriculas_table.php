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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id('NumeroMatricula'); // AUTO_INCREMENT
            $table->string('RunAlumno', 12);
            $table->string('RunApoderado', 12);
            $table->date('FechaInscripcion');
            $table->unsignedBigInteger('IDMatriculaEstado'); // Referencia a EstadoMatricula
        
            // Claves foráneas
            $table->foreign('RunAlumno')->references('RunAlumno')->on('alumnos')->onDelete('cascade');
            $table->foreign('RunApoderado')->references('RunApoderado')->on('apoderados')->onDelete('cascade');
            $table->foreign('IDMatriculaEstado')->references('IDMatriculaEstado')->on('estado_matriculas')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
