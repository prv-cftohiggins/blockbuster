<?php

namespace Database\Seeders;

use App\Models\Socio;
use Illuminate\Database\Seeder;

class SocioSeeder extends Seeder
{
    /**
     * Carga socios de prueba, con edades y estados variados.
     */
    public function run(): void
    {
        $socios = [
            ['rut' => '11111111-1', 'nombre' => 'Rosa Fuentes Pino', 'email' => 'rosa.fuentes@example.com', 'telefono' => '+56911111111', 'fecha_nacimiento' => '1958-03-14', 'estado' => 'activo'],
            ['rut' => '12345678-5', 'nombre' => 'Carlos Muñoz Soto', 'email' => 'carlos.munoz@example.com', 'telefono' => '+56922222222', 'fecha_nacimiento' => '1972-08-02', 'estado' => 'activo'],
            ['rut' => '15678234-3', 'nombre' => 'Patricia Rojas Vera', 'email' => 'patricia.rojas@example.com', 'telefono' => null, 'fecha_nacimiento' => '1983-11-25', 'estado' => 'suspendido'],
            ['rut' => '16789012-1', 'nombre' => 'Jorge Díaz Lagos', 'email' => 'jorge.diaz@example.com', 'telefono' => '+56933333333', 'fecha_nacimiento' => '1986-06-10', 'estado' => 'activo'],
            ['rut' => '18234567-9', 'nombre' => 'Camila Herrera Paz', 'email' => 'camila.herrera@example.com', 'telefono' => '+56944444444', 'fecha_nacimiento' => '1992-01-30', 'estado' => 'activo'],
            ['rut' => '19876543-0', 'nombre' => 'Matías Contreras Gil', 'email' => 'matias.contreras@example.com', 'telefono' => null, 'fecha_nacimiento' => '1997-09-18', 'estado' => 'suspendido'],
            ['rut' => '20456789-1', 'nombre' => 'Valentina Silva Mora', 'email' => 'valentina.silva@example.com', 'telefono' => '+56955555555', 'fecha_nacimiento' => '2000-04-07', 'estado' => 'activo'],
            ['rut' => '21345678-4', 'nombre' => 'Benjamín Torres Ríos', 'email' => 'benjamin.torres@example.com', 'telefono' => '+56966666666', 'fecha_nacimiento' => '2003-12-21', 'estado' => 'activo'],

            // Menores de edad: la fecha se calcula desde hoy para que sigan siendo menores
            // aunque el seeder se ejecute dentro de unos años.
            ['rut' => '23456789-6', 'nombre' => 'Sofía Reyes Campos', 'email' => 'sofia.reyes@example.com', 'telefono' => null, 'fecha_nacimiento' => now()->subYears(16)->toDateString(), 'estado' => 'activo'],
            ['rut' => '24567890-8', 'nombre' => 'Tomás Castillo Peña', 'email' => 'tomas.castillo@example.com', 'telefono' => null, 'fecha_nacimiento' => now()->subYears(12)->toDateString(), 'estado' => 'activo'],
        ];

        foreach ($socios as $socio) {
            // El RUT identifica al socio: si ya existe se actualiza, si no se crea.
            Socio::updateOrCreate(
                ['rut' => $socio['rut']],
                $socio,
            );
        }
    }
}