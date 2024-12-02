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
        Schema::create('detalleregistroclases', function (Blueprint $table) {
            $table->id('IdDetalleRegistroClase'); // AUTO_INCREMENT
            $table->decimal('NotaEvaluacion', 3, 2)->nullable(); // Nota de la evaluación
            $table->unsignedBigInteger('IdRegistroClases'); // Relación con la clase
            $table->unsignedBigInteger('NumeroMatricula'); // Relación con matrícula
            $table->unsignedBigInteger('IdEvaluacion')->nullable(); // Relación con evaluación
            $table->unsignedBigInteger('IdAnotacion')->nullable(); // Relación con anotación
            $table->unsignedBigInteger('IdAsistencia')->nullable(); // Relación con asistencia
    
            // Claves foráneas
            $table->foreign('IdRegistroClases')->references('IdRegistroClases')->on('registroclases')->onDelete('restrict');
            $table->foreign('NumeroMatricula')->references('NumeroMatricula')->on('matriculas')->onDelete('restrict');
            $table->foreign('IdEvaluacion')->references('IdEvaluacion')->on('evaluacions')->onDelete('set null');
            $table->foreign('IdAnotacion')->references('IdAnotacion')->on('anotacions')->onDelete('set null');
            $table->foreign('IdAsistencia')->references('IdAsistencia')->on('asistencias')->onDelete('set null');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleregistroclases');
    }
};
