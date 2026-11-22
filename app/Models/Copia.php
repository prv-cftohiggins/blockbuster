<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Copia extends Model
{
    /**
     * Formatos en que puede venir una copia.
     */
    public const FORMATOS = ['VHS', 'DVD', 'Blu-ray'];

    /**
     * Estados posibles de una copia: valor guardado => texto para mostrar.
     */
    public const ESTADOS = [
        'disponible' => 'Disponible',
        'arrendada' => 'Arrendada',
        'danada' => 'Dañada',
        'baja' => 'De baja',
    ];

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
