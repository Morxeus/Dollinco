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
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->id('IDEvaluacion'); // AUTO_INCREMENT
            $table->date('FechaEvaluacion')->nullable();
            $table->decimal('Nota', 3, 1); // Nota con 1 dígitos en total y 2 decimales
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacions');
    }
};
