<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') · Blockbuster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2.0.6/css/pico.min.css">
</head>
<body>
    <header class="container">
        <nav>
            <ul>
                <li><strong>Blockbuster</strong></li>
            </ul>
            <ul>
                <li><a href="{{ route('generos.index') }}">Géneros</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <h1>@yield('titulo')</h1>

        @yield('contenido')
    </main>
</body>
</html>
