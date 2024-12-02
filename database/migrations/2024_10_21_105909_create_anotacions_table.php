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
        Schema::create('anotacions', function (Blueprint $table) {
            $table->id('IDAnotacion'); // AUTO_INCREMENT
            $table->string('TipoAnotacion', 50); // Tipo de anotación
            $table->date('Fecha'); // Fecha de la anotación
            $table->text('Descripcion'); // Descripción de la anotación
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anotacions');
    }
};
