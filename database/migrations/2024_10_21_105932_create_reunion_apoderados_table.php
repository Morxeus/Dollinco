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
        Schema::create('reunion_apoderados', function (Blueprint $table) {
            $table->id('IdReunionApoderado'); // AUTO_INCREMENT
            $table->string('Asistencia', 50); // Asistencia del apoderado
            $table->string('RunApoderado', 12); // Referencia a apoderado
            $table->unsignedBigInteger('IdReunion')->nullable(); // Relación con reunión
            $table->unsignedBigInteger('IdMalla')->nullable(); // Relación con malla
    
            // Claves foráneas
            $table->foreign('RunApoderado')->references('RunApoderado')->on('apoderados')->onDelete('restrict');
            $table->foreign('IdReunion')->references('IdReunion')->on('reunions')->onDelete('restrict');
            $table->foreign('IdMalla')->references('IdMalla')->on('mallas')->onDelete('restrict');
    
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunion_apoderados');
    }
};
