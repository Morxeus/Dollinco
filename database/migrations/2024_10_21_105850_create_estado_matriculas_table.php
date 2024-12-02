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
        Schema::create('estado_matriculas', function (Blueprint $table) {
            $table->id('IDMatriculaEstado'); // AUTO_INCREMENT
            $table->string('EstadoMatricula');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_matriculas');
    }
};
