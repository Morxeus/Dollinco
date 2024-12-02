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
        Schema::create('reunions', function (Blueprint $table) {
            $table->id('IDReunion'); // AUTO_INCREMENT
            $table->char('TipoReunion', 1); // Tipo de reunión (puedes ajustar según tus necesidades)
            $table->string('RunProfesor', 12); // Referencia al ProfesorDirector
            $table->dateTime('Fecha');
        
            // Definición de la clave foránea
            $table->foreign('RunProfesor')->references('RunProfesor')->on('profesor_directors')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunions');
    }
};
