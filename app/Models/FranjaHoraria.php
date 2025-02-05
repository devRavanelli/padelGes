<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranjaHoraria extends Model
{
    use HasFactory;

    protected $table = 'franjas_horarias'; // Nombre de la tabla

    protected $fillable = [
        'hora_inicio', // Los campos que se pueden asignar masivamente

    ];
    protected $casts = [
        'hora_inicio' => 'datetime:H:i:s', // Esto convertirá 'fecha' en un objeto Carbon
    ];
    /**
     * Relaciones con otras tablas
     */


    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_franja'); // Relación con la tabla reservas
    }
}
