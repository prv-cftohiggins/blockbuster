<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes; // al eliminar un socio no se borra la fila, solo anota la fecha del delete_at

    protected $fillable = [ // lista de los campos que se pueden rellenar con create()
        'rut',
        'nombre',
        'email',
        'telefono',
        'fecha_nacimiento',
        'estado',
    ];

    protected function casts(): array // laravel no entregue el texto sino un objeto carbon que es mas facil de trabajar para este proyecto
    {
        return [
            'fecha_nacimiento' => 'date',
        ];
    }

    // Un socio suspendido no puede arrendar.
    public function estaActivo(): bool
    {
        return $this->estado === 'activo';
    }

    // Años cumplidos a hoy, calculados desde la fecha de nacimiento.
    public function edad(): int
    {
        return $this->fecha_nacimiento->age;
    }
    // RUT con puntos de miles, formato chileno: 12.345.678-5
    public function rutFormateado(): string
    {
        [$numero, $dv] = explode('-', $this->rut);

        return number_format((int) $numero, 0, ',', '.') . '-' . $dv;
    }


}
