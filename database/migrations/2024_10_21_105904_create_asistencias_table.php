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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('IDAsistencia'); // AUTO_INCREMENT
            $table->dateTime('Fecha'); // Fecha y hora de la asistencia
            $table->string('EstadoAsistencia', 10)->default('')->nullable(false); // Nuevo campo EstadoAsistencia
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
