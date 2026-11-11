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
        // Dos géneros no pueden llamarse igual.
        Schema::table('generos', function (Blueprint $table) {
            $table->unique('nombre');
        });

        // Una sinopsis no cabe en los 255 caracteres de un string.
        Schema::table('peliculas', function (Blueprint $table) {
            $table->text('sinopsis')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            $table->string('sinopsis')->change();
        });

        Schema::table('generos', function (Blueprint $table) {
            $table->dropUnique(['nombre']);
        });
    }
};
