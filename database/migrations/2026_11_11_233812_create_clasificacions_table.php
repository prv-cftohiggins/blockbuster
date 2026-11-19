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
        Schema::create('clasificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique(); // 'TE', 'TE+7', '14', '18'
            $table->string('nombre');          // 'Todo espectador', 'Mayores de 14 años', etc.
            $table->integer('edad_minima');    // 0, 7, 14 o 18
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clasificacions');
    }
};
