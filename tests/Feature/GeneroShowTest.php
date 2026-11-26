<?php

namespace Tests\Feature;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneroShowTest extends TestCase
{
    use RefreshDatabase;

    private function crearPelicula(Genero $genero, string $titulo): Pelicula
    {
        return Pelicula::create([
            'titulo' => $titulo, 'anio' => 1999, 'director' => 'Alguien', 'reparto' => 'Varios',
            'genero_id' => $genero->id, 'duracion' => 120, 'sinopsis' => 'Una sinopsis.',
        ]);
    }

    public function test_muestra_solo_las_peliculas_del_genero(): void
    {
        $accion = Genero::create(['nombre' => 'Acción', 'descripcion' => 'Explosiones.']);
        $comedia = Genero::create(['nombre' => 'Comedia', 'descripcion' => 'Risas.']);
        $this->crearPelicula($accion, 'Duro de matar');
        $this->crearPelicula($comedia, 'Mi pobre angelito');

        $this->get(route('generos.show', $accion))
            ->assertOk()
            ->assertSee('Duro de matar')
            ->assertDontSee('Mi pobre angelito');
    }

    public function test_usa_singular_con_una_pelicula(): void
    {
        $accion = Genero::create(['nombre' => 'Acción', 'descripcion' => 'Explosiones.']);
        $this->crearPelicula($accion, 'Duro de matar');

        $this->get(route('generos.show', $accion))
            ->assertOk()
            ->assertSee('1 película en este género.');
    }

    public function test_genero_sin_peliculas_muestra_aviso(): void
    {
        $terror = Genero::create(['nombre' => 'Terror', 'descripcion' => 'Sustos.']);

        $this->get(route('generos.show', $terror))
            ->assertOk()
            ->assertSee('Este género todavía no tiene películas.');
    }

    public function test_genero_inexistente_da_404(): void
    {
        $this->get('/generos/999')->assertNotFound();
    }
}
