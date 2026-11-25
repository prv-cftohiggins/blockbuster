<?php

namespace Tests\Feature;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PeliculasPorGeneroTest extends TestCase
{
    use RefreshDatabase;

    private function crearPelicula(Genero $genero, string $titulo): Pelicula
    {
        return Pelicula::create([
            'titulo' => $titulo, 'anio' => 1999, 'director' => 'Alguien', 'reparto' => 'Varios',
            'genero_id' => $genero->id, 'duracion' => 120, 'sinopsis' => 'Una sinopsis.',
        ]);
    }

    public function test_muestra_las_peliculas_agrupadas_por_genero(): void
    {
        $accion = Genero::create(['nombre' => 'Acción', 'descripcion' => 'Explosiones.']);
        $comedia = Genero::create(['nombre' => 'Comedia', 'descripcion' => 'Risas.']);
        $this->crearPelicula($accion, 'Duro de matar');
        $this->crearPelicula($comedia, 'Mi pobre angelito');

        $this->get('/generos')->assertOk()
            ->assertSeeInOrder(['Acción', 'Duro de matar', 'Comedia', 'Mi pobre angelito']);
    }

    public function test_filtra_por_un_genero(): void
    {
        $accion = Genero::create(['nombre' => 'Acción', 'descripcion' => 'Explosiones.']);
        $comedia = Genero::create(['nombre' => 'Comedia', 'descripcion' => 'Risas.']);
        $this->crearPelicula($accion, 'Duro de matar');
        $this->crearPelicula($comedia, 'Mi pobre angelito');

        $this->get(route('peliculas.por-genero', $accion))->assertOk()
            ->assertSee('Duro de matar')->assertDontSee('Mi pobre angelito');
    }

    public function test_genero_inexistente_da_404(): void
    {
        $this->get('/generos/999')->assertNotFound();
    }
}
