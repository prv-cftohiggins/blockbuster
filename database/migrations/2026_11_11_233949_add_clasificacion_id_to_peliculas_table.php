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
        Schema::table('peliculas', function (Blueprint $table) {

            $table->foreignId('clasificacion_id')
                ->nullable()
                ->constrained('clasificaciones')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            $table->dropForeign(['clasificacion_id']);
            $table->dropColumn('clasificacion_id');
        });
    }
};
