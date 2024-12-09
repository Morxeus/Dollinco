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
        Schema::table('reunion_apoderados', function (Blueprint $table) {
            $table->dropForeign(['RunApoderado']);
            $table->dropColumn('RunApoderado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reunion_apoderados', function (Blueprint $table) {
            $table->string('RunApoderado', 12);
            $table->foreign('RunApoderado')->references('RunApoderado')->on('apoderados')->onDelete('restrict');
        });
    }
};
