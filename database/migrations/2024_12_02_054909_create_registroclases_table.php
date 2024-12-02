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
        Schema::create('registroclases', function (Blueprint $table) {
            $table->id('IdRegistroClases'); // AUTO_INCREMENT
            $table->unsignedBigInteger('IdMalla'); // Relación con la asignatura/curso
            $table->dateTime('FechaClase'); // Fecha de la clase
            $table->string('DescripcionClase', 255)->nullable(); // Descripción opcional
    
            // Clave foránea
            $table->foreign('IdMalla')->references('IdMalla')->on('mallas')->onDelete('restrict');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registroclases');
    }
};
