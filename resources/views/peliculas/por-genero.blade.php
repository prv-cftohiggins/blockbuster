<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $generoActual ? $generoActual->nombre.' · ' : '' }}Películas por género · {{ config('app.name', 'Blockbuster') }}</title>
    <style>
        :root { --fondo:#f7f7f5; --tarjeta:#fff; --texto:#1b1b18; --suave:#6b6b66; --borde:#e3e3e0; --acento:#0b3d91; --acento-texto:#fff; --resalte:#ffcc00; }
        @media (prefers-color-scheme: dark) {
            :root { --fondo:#0f0f0e; --tarjeta:#1a1a18; --texto:#ededec; --suave:#a1a09a; --borde:#33332f; --acento:#ffcc00; --acento-texto:#1b1b18; }
        }
        * { box-sizing: border-box; }
        body { margin:0; font-family: ui-sans-serif, system-ui, sans-serif; background:var(--fondo); color:var(--texto); line-height:1.5; }
        .contenedor { max-width:1100px; margin:0 auto; padding:24px 16px 48px; }
        header h1 { margin:0 0 4px; font-size:1.75rem; }
        header p { margin:0; color:var(--suave); }
        nav.generos { display:flex; flex-wrap:wrap; gap:8px; margin:24px 0 32px; }
        nav.generos a { padding:6px 14px; border:1px solid var(--borde); border-radius:999px; background:var(--tarjeta); color:var(--texto); text-decoration:none; font-size:.9rem; }
        nav.generos a:hover { border-color:var(--acento); }
        nav.generos a[aria-current="page"] { background:var(--acento); border-color:var(--acento); color:var(--acento-texto); }
        nav.generos .cuenta { font-size:.8rem; opacity:.75; }
        section.genero { margin-bottom:40px; }
        section.genero h2 { margin:0 0 4px; font-size:1.3rem; border-left:4px solid var(--resalte); padding-left:10px; }
        section.genero > p { margin:0 0 16px; color:var(--suave); }
        .grilla { display:grid; gap:16px; grid-template-columns:repeat(auto-fill, minmax(240px, 1fr)); }
        article.pelicula { background:var(--tarjeta); border:1px solid var(--borde); border-radius:10px; padding:16px; display:flex; flex-direction:column; gap:8px; }
        article.pelicula h3 { margin:0; font-size:1.05rem; }
        .datos { color:var(--suave); font-size:.85rem; }
        .sinopsis { margin:0; font-size:.9rem; }
        .etiqueta { align-self:flex-start; font-size:.75rem; font-weight:600; padding:2px 8px; border-radius:4px; border:1px solid var(--borde); }
        .vacio { color:var(--suave); font-style:italic; }
    </style>
</head>
<body>
<div class="contenedor">
    <header>
        <h1>Películas por género</h1>
        <p>
            @if ($generoActual)
                {{ $generoActual->peliculas->count() }} {{ $generoActual->peliculas->count() === 1 ? 'película' : 'películas' }} de {{ $generoActual->nombre }}
            @else
                Explora el catálogo según el género que te guste.
            @endif
        </p>
    </header>

    <nav class="generos" aria-label="Géneros">
        <a href="{{ route('peliculas.por-genero') }}" @if (! $generoActual) aria-current="page" @endif>Todos</a>
        @foreach ($generos as $genero)
            <a href="{{ route('peliculas.por-genero', $genero) }}" @if ($generoActual?->is($genero)) aria-current="page" @endif>
                {{ $genero->nombre }} <span class="cuenta">{{ $genero->peliculas_count }}</span>
            </a>
        @endforeach
    </nav>

    @forelse ($seleccionados as $genero)
        <section class="genero">
            <h2>{{ $genero->nombre }}</h2>
            @if ($genero->descripcion)
                <p>{{ $genero->descripcion }}</p>
            @endif

            @if ($genero->peliculas->isEmpty())
                <p class="vacio">Todavía no hay películas en este género.</p>
            @else
                <div class="grilla">
                    @foreach ($genero->peliculas as $pelicula)
                        <article class="pelicula">
                            <h3>{{ $pelicula->titulo }}</h3>
                            <div class="datos">{{ $pelicula->anio }} · {{ $pelicula->duracion }} min · {{ $pelicula->director }}</div>
                            @if ($pelicula->clasificacion)
                                <span class="etiqueta" title="{{ $pelicula->clasificacion->nombre }}">{{ $pelicula->clasificacion->codigo }}</span>
                            @endif
                            <p class="sinopsis">{{ $pelicula->sinopsis }}</p>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    @empty
        <p class="vacio">No hay películas en el catálogo.</p>
    @endforelse
</div>
</body>
</html>
