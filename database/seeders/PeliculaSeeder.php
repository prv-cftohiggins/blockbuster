<?php

namespace Database\Seeders;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Carga las películas del catálogo. Necesita que GeneroSeeder haya corrido antes.
     */
    public function run(): void
    {
        $peliculas = [
            ['Matrix', 1999, 'Lana Wachowski y Lilly Wachowski', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss', 'Ciencia ficción', 136,
                'Un programador descubre que el mundo que conoce es una simulación y se une a quienes luchan contra las máquinas que la controlan.'],
            ['Volver al futuro', 1985, 'Robert Zemeckis', 'Michael J. Fox, Christopher Lloyd, Lea Thompson', 'Ciencia ficción', 116,
                'Un adolescente viaja por accidente a 1955 en un auto convertido en máquina del tiempo y pone en riesgo su propia existencia.'],
            ['Terminator 2: El juicio final', 1991, 'James Cameron', 'Arnold Schwarzenegger, Linda Hamilton, Edward Furlong', 'Acción', 137,
                'Un robot enviado desde el futuro debe proteger a un niño de otro robot más avanzado que viene a eliminarlo.'],
            ['Duro de matar', 1988, 'John McTiernan', 'Bruce Willis, Alan Rickman, Bonnie Bedelia', 'Acción', 132,
                'Un policía queda atrapado en un rascacielos tomado por asaltantes durante una fiesta de Navidad.'],
            ['Jurassic Park', 1993, 'Steven Spielberg', 'Sam Neill, Laura Dern, Jeff Goldblum', 'Aventura', 127,
                'Un grupo de visitantes recorre un parque con dinosaurios clonados justo cuando fallan los sistemas de seguridad.'],
            ['Indiana Jones y los cazadores del arca perdida', 1981, 'Steven Spielberg', 'Harrison Ford, Karen Allen, Paul Freeman', 'Aventura', 115,
                'Un arqueólogo compite contra los nazis para encontrar el Arca de la Alianza.'],
            ['Mi pobre angelito', 1990, 'Chris Columbus', 'Macaulay Culkin, Joe Pesci, Daniel Stern', 'Comedia', 103,
                'Un niño olvidado en casa durante las vacaciones defiende su hogar de dos ladrones.'],
            ['Hechizo del tiempo', 1993, 'Harold Ramis', 'Bill Murray, Andie MacDowell, Chris Elliott', 'Comedia', 101,
                'Un meteorólogo malhumorado queda atrapado repitiendo el mismo día una y otra vez.'],
            ['Forrest Gump', 1994, 'Robert Zemeckis', 'Tom Hanks, Robin Wright, Gary Sinise', 'Drama', 142,
                'Un hombre sencillo de Alabama atraviesa, casi sin proponérselo, varias décadas de la historia de Estados Unidos.'],
            ['Sueños de libertad', 1994, 'Frank Darabont', 'Tim Robbins, Morgan Freeman, Bob Gunton', 'Drama', 142,
                'Un banquero condenado a cadena perpetua entabla una larga amistad dentro de la cárcel y no pierde la esperanza de salir.'],
            ['El resplandor', 1980, 'Stanley Kubrick', 'Jack Nicholson, Shelley Duvall, Danny Lloyd', 'Terror', 146,
                'Un escritor se instala con su familia como cuidador de un hotel aislado en la montaña, y el encierro lo va trastornando.'],
            ['Alien: El octavo pasajero', 1979, 'Ridley Scott', 'Sigourney Weaver, Tom Skerritt, John Hurt', 'Terror', 117,
                'La tripulación de una nave de carga responde a una señal desconocida y sube a bordo a una criatura letal.'],
            ['Toy Story', 1995, 'John Lasseter', 'Tom Hanks, Tim Allen, Don Rickles', 'Animación', 81,
                'El juguete favorito de un niño ve amenazado su lugar cuando llega un astronauta de juguete nuevo.'],
            ['El rey león', 1994, 'Roger Allers y Rob Minkoff', 'Matthew Broderick, Jeremy Irons, James Earl Jones', 'Animación', 88,
                'Un león joven huye tras la muerte de su padre y años después debe volver a reclamar su lugar.'],
            ['El silencio de los inocentes', 1991, 'Jonathan Demme', 'Jodie Foster, Anthony Hopkins, Scott Glenn', 'Suspenso', 118,
                'Una agente en formación del FBI pide ayuda a un asesino encarcelado para atrapar a otro que sigue libre.'],
            ['Pecados capitales', 1995, 'David Fincher', 'Brad Pitt, Morgan Freeman, Gwyneth Paltrow', 'Suspenso', 127,
                'Dos detectives persiguen a un asesino que elige a sus víctimas según los siete pecados capitales.'],
        ];

        // Un diccionario nombre => id, para no consultar la base de datos por cada película.
        $generos = Genero::pluck('id', 'nombre');

        foreach ($peliculas as [$titulo, $anio, $director, $reparto, $genero, $duracion, $sinopsis]) {
            Pelicula::updateOrCreate(
                ['titulo' => $titulo, 'anio' => $anio],
                [
                    'director' => $director,
                    'reparto' => $reparto,
                    'genero_id' => $generos[$genero],
                    'duracion' => $duracion,
                    'sinopsis' => $sinopsis,
                ],
            );
        }
    }
}
