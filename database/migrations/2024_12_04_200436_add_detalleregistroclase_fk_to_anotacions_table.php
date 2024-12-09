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
        Schema::table('anotacions', function (Blueprint $table) {
            $table->unsignedBigInteger('IdDetalleRegistroClase')->nullable(); // Relación con detalleregistroclases
            $table->foreign('IdDetalleRegistroClase') // Crear la clave foránea
                  ->references('IdDetalleRegistroClase')->on('detalleregistroclases')
                  ->onDelete('set null'); // Opcional: manejar eliminación
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anotacions', function (Blueprint $table) {
       // Eliminar la clave foránea y el campo
        $table->dropForeign(['IdDetalleRegistroClase']);
        $table->dropColumn('IdDetalleRegistroClase');
        });
    }
};
