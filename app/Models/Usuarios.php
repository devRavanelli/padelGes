<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'dni',
        'email',
        'telefono',
        'direccion',
        'nivel',
        'sexo',
        'password',
        'rol',
        'activo',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
        ];
    }
}
