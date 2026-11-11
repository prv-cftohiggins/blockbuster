# Blockbuster

El sistema de un videoclub, escrito entre todos en Laravel 13. Proyecto del ramo Programación Avanzada (PRV001).

Material de apoyo: [Construyendo un Blockbuster](https://hlp.noquierouser.com/ramos/programacion-avanzada/construyendo-un-blockbuster/).

## Qué hay hasta ahora

| Modelo | Tabla | Qué guarda | Relaciones |
|---|---|---|---|
| `Genero` | `generos` | Nombre y descripción de un género | Tiene muchas películas: `peliculas()` |
| `Pelicula` | `peliculas` | Título, año, director, reparto, duración y sinopsis | Pertenece a un género: `genero()` |

Los dos modelos usan borrado suave (`SoftDeletes`): al eliminar una fila no se borra, solo queda marcada con la fecha en `deleted_at`.

## Hacerlo funcionar después de clonar

Necesitas el [entorno instalado](https://hlp.noquierouser.com/ramos/programacion-avanzada/construyendo-un-blockbuster/entorno-fedora/): Lerd, PHP 8.5, Composer y Git.

### 1. Clonar

```bash
cd ~/Proyectos
git clone git@github.com:prv-cftohiggins/blockbuster.git blockbuster-grupo
cd blockbuster-grupo
```

El último argumento es el nombre de la carpeta. Como queda dentro de `~/Proyectos`, Lerd lo publica en `http://blockbuster-grupo.test`.

### 2. Preparar el proyecto

Un proyecto recién clonado no funciona: le falta todo lo que no se sube a GitHub. Con Lerd es un comando:

```bash
lerd setup
```

O a mano, que es lo mismo paso por paso:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

Si `migrate` pregunta si quieres crear la base de datos SQLite, responde que sí.

### 3. Cargar los datos de prueba

```bash
php artisan db:seed
```

Carga 8 géneros y 16 películas. Se puede ejecutar varias veces: no duplica filas.

Para partir de cero (borra todas las tablas, las crea de nuevo y carga los datos):

```bash
php artisan migrate:fresh --seed
```

### 4. Comprobar

- `http://blockbuster-grupo.test` muestra la página de bienvenida.
- `http://blockbuster-grupo.test/peliculas` muestra el catálogo en JSON.

Y desde la terminal, con `php artisan tinker`:

```php
App\Models\Pelicula::count();                          // 16
App\Models\Pelicula::with('genero')->first();          // una película con su género
App\Models\Genero::where('nombre', 'Terror')->first()->peliculas;  // las películas de un género
```

Se sale con `exit`.

## Cuando traes cambios de otra persona

Después de un `git pull`, si alguien agregó una biblioteca, una migración o un seeder:

```bash
composer install
php artisan migrate
php artisan db:seed
```

## Cómo trabajamos

- Nadie sube directo a `main`. Cada cambio va en su propia rama y entra por un pull request.
- Los pull requests los revisa y fusiona la PM del proyecto, que también resuelve los conflictos. Si pide cambios, se corrigen en la misma rama.
- Los nombres del dominio van en español y sin tildes ni eñes en el código: `Pelicula`, `anio`, `Genero`.
- Un modelo nuevo llega completo: migración, modelo, seeder con datos y su registro en `DatabaseSeeder`.

## Agregar un modelo: la receta

```bash
php artisan make:model Copia --migration --seed
```

Ese comando crea tres archivos: `app/Models/Copia.php`, una migración en `database/migrations/` y `database/seeders/CopiaSeeder.php`. Después:

1. **Migración:** define las columnas de la tabla.
2. **Modelo:** `$fillable`, las relaciones y `SoftDeletes`, igual que `Pelicula`.
3. **Relación inversa:** si tu modelo pertenece a otro, agrégale al otro el método que lo trae de vuelta.
4. **Seeder:** datos de prueba con `updateOrCreate`, como `PeliculaSeeder`.
5. **`DatabaseSeeder`:** agrega tu seeder a la lista, después de los que necesita.
6. **Prueba:** `php artisan migrate:fresh --seed` y revisa en `tinker`.
