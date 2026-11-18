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
        Schema::create('copias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelicula_id')->constrained('peliculas')->cascadeOnDelete();
            $table->string('codigo')->unique(); // Ej: BB-0001, BB-0002...
            $table->string('formato');          // VHS, DVD o Blu-ray
            $table->string('estado')->default('disponible'); // disponible, arrendada, danada o baja
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copias');
    }
};
