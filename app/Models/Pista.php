<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{
    use HasFactory;

    protected $table = 'pistas'; // Nombre de la tabla

    protected $fillable = [
        'nombre_pista',
        'descripcion',
        'tipo_pared',
        'tipo_suelo',
        'imagen',
    ];

    /**
     * Relaciones con otras tablas
     */
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_pista'); // Relación con la tabla reservas
    }
}
