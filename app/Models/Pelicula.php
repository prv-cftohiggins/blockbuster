<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelicula extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'anio',
        'director',
        'reparto',
        'genero_id',
        'duracion',
        'sinopsis',
    ];

    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class);
    }
}
