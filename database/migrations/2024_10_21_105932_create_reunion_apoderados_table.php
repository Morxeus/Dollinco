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
            $table->id('IDReunionApoderado'); // AUTO_INCREMENT
            $table->string('Asistencia', 10); // Asistencia a la reunión (puedes ajustar según tus necesidades)
            $table->dateTime('HoraInicioReunionApoderado');
            $table->dateTime('HoraFinReunionApoderado');
            $table->string('RunApoderado', 12); // Referencia al Apoderado
            $table->unsignedBigInteger("IDReunion"); // Referencia a Reunion
        
           // Definición de las claves foráneas 
           $table -> foreign ('RunApoderado') -> references ('RunApoderado') -> on ('apoderados') -> onDelete ('cascade');
           $table -> foreign ('IDReunion') -> references ('IDReunion') -> on ('reunions') -> onDelete ('cascade');
        
           $table -> timestamps ();

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
