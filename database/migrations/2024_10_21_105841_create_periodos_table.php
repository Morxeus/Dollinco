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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id('IDPeriodo'); // AUTO_INCREMENT
            $table->date('FechaInicio'); // Fecha de inicio del período
            $table->date('FechaFin'); // Fecha de fin del período
            $table->unsignedBigInteger('IDPeriodoE'); // Referencia a EstadoPeriodo

            // Clave foránea
            $table->foreign('IDPeriodoE')->references('IDPeriodoE')->on('estado_periodos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos');
    }
};
