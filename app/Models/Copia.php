<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Copia extends Model
{
    protected $fillable = [
        'pelicula_id',
        'codigo',
        'formato',
        'estado',
    ];

    /**
     * Una copia pertenece a una película.
     */
    public function pelicula(): BelongsTo
    {
        return $this->belongsTo(Pelicula::class, 'pelicula_id');
    }

    /**
     * Método propio: indica si la copia está disponible para arriendo.
     */
    public function estaDisponible(): bool
    {
        return $this->estado === 'disponible';
    }
}
