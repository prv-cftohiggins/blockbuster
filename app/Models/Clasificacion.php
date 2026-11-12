<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clasificacion extends Model
{
    // Forzar el nombre:
    protected $table = 'clasificaciones';

    protected $fillable = [
        'codigo',
        'nombre',
        'edad_minima',
    ];

    /**
     * Una clasificación tiene muchas películas.
     */
    public function peliculas(): HasMany
    {
        return $this->hasMany(Pelicula::class, 'clasificacion_id');
    }

    /**
     * si alguien de determinada edad puede ver una película con esta clasificación.
     */
    public function permite(int $edad): bool
    {
        return $edad >= $this->edad_minima;
    }
}
