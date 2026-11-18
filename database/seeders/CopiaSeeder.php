<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CopiaSeeder extends Seeder
{
    public function run(): void
    {
        $peliculas = Pelicula::all();
        $formatos = ['VHS', 'DVD', 'Blu-ray'];
        $correlativo = 1;

        foreach ($peliculas as $pelicula) {
            // Genera aleatoriamente 2 o 3 copias por cada película del catálogo
            $cantidadCopias = rand(2, 3);

            for ($i = 0; $i < $cantidadCopias; $i++) {
                // Genera un código correlativo único, ej: BB-0001, BB-0002...
                $codigo = 'BB-' . str_pad($correlativo, 4, '0', STR_PAD_LEFT);

                // Asigna estados variados para cumplir la instrucción (algunas distintas de 'disponible')
                $estado = ($correlativo % 4 === 0) ? 'arrendada' : (($correlativo % 7 === 0) ? 'danada' : 'disponible');

                Copia::create([
                    'pelicula_id' => $pelicula->id,
                    'codigo'      => $codigo,
                    'formato'     => $formatos[array_rand($formatos)],
                    'estado'      => $estado,
                ]);

                $correlativo++;
            }
        }
    }
}
