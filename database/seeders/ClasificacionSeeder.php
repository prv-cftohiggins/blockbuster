<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clasificacion;
use App\Models\Pelicula;

class ClasificacionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear las cuatro clasificaciones
        $te = Clasificacion::create([
            'codigo' => 'TE',
            'nombre' => 'Todo espectador',
            'edad_minima' => 0
        ]);

        $te7 = Clasificacion::create([
            'codigo' => 'TE+7',
            'nombre' => 'Mayores de 7 años',
            'edad_minima' => 7
        ]);

        $c14 = Clasificacion::create([
            'codigo' => '14',
            'nombre' => 'Mayores de 14 años',
            'edad_minima' => 14
        ]);

        $c18 = Clasificacion::create([
            'codigo' => '18',
            'nombre' => 'Mayores de 18 años',
            'edad_minima' => 18
        ]);

        // 2. Asignar una clasificación a cada película del catálogo existente
        $peliculas = Pelicula::all();
        foreach ($peliculas as $index => $pelicula) {
            // Ejemplo de distribución cíclica o aleatoria para el catálogo
            $clasificacion = match ($index % 4) {
                0 => $te,
                1 => $te7,
                2 => $c14,
                3 => $c18,
            };

            $pelicula->update(['clasificacion_id' => $clasificacion->id]);
        }
    }
}
