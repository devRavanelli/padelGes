<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas'; // Nombre de la tabla

    protected $fillable = [
        'fecha',
        'id_franja',
        'id_pista',
        'id_usuario',
    ];

    // Aseguramos que la columna 'fecha' sea tratada como un objeto Carbon
    protected $casts = [
        'fecha' => 'datetime', // Esto convertirá 'fecha' en un objeto Carbon
    ];

    /**
     * Relaciones con otras tablas
     */
    public function franja()
    {
        return $this->belongsTo(FranjaHoraria::class, 'id_franja');
    }

    public function pista()
    {
        return $this->belongsTo(Pista::class, 'id_pista');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
