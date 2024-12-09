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
        Schema::table('detalleregistroclases', function (Blueprint $table) {
            $table->dropForeign(['IdAnotacion']); // Elimina la clave foránea
            $table->dropColumn('IdAnotacion'); // Elimina la columna
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalleregistroclases', function (Blueprint $table) {
            $table->unsignedBigInteger('IdAnotacion')->nullable();
            $table->foreign('IdAnotacion')->references('IdAnotacion')->on('anotacions')->onDelete('set null');
        });
    }
};
