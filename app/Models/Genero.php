<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'descripcion'];

    public function peliculas(): HasMany
    {
        return $this->hasMany(Pelicula::class);
    }
}
