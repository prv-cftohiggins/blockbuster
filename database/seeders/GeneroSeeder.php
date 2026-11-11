<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Carga los géneros del catálogo.
     */
    public function run(): void
    {
        $generos = [
            ['nombre' => 'Acción', 'descripcion' => 'Persecuciones, peleas y explosiones.'],
            ['nombre' => 'Aventura', 'descripcion' => 'Viajes, exploración y peligros lejos de casa.'],
            ['nombre' => 'Ciencia ficción', 'descripcion' => 'Futuros posibles, tecnología y viajes en el tiempo.'],
            ['nombre' => 'Comedia', 'descripcion' => 'Películas para reírse.'],
            ['nombre' => 'Drama', 'descripcion' => 'Historias centradas en los personajes y sus conflictos.'],
            ['nombre' => 'Terror', 'descripcion' => 'Películas para pasar susto.'],
            ['nombre' => 'Animación', 'descripcion' => 'Dibujos animados y animación por computador.'],
            ['nombre' => 'Suspenso', 'descripcion' => 'Misterios, crímenes e investigaciones.'],
        ];

        foreach ($generos as $genero) {
            // updateOrCreate permite ejecutar el seeder varias veces sin duplicar filas.
            Genero::updateOrCreate(
                ['nombre' => $genero['nombre']],
                ['descripcion' => $genero['descripcion']],
            );
        }
    }
}
