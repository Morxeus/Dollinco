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
        Schema::create('curso_ofrecidos', function (Blueprint $table) {
            $table->id('IDCursoOfrecido'); // AUTO_INCREMENT
            $table->date('Año');
            $table->unsignedBigInteger('IDCurso'); // Referencia a cursos
            $table->char('Letra', 1);
            $table->integer('Cupos');
            $table->unsignedBigInteger('IDPeriodo'); // Campo ID_Periodo

            // Clave foránea
            $table->foreign('IDCurso')->references('IDCurso')->on('cursos')->onDelete('cascade');
            $table->foreign('IDPeriodo')->references('IDPeriodo')->on('periodos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_ofrecidos');
    }
};
