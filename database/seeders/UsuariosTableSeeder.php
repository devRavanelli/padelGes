<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Sammy',
                'apellido1' => 'Odeh',
                'apellido2' => 'Torró',
                'dni' => '24397601Y',
                'email' => 'admin@example.com',
                'telefono' => '643434343',
                'direccion' => 'Calle Admin, 1',
                'password' => Hash::make('password'), // Encriptar contraseña
                'rol' => 'admin',
                'activo' => true,
                'nivel' => 3.5,  // Nivel de pádel
                'sexo' => 'M',
                'email_verified_at' => now(),
                'created_at' => now(), // Añadir la fecha de creación
                'updated_at' => now(), // También actualizar el campo updated_at
            ],
            [
                'nombre' => 'Nestor',
                'apellido1' => 'García',
                'apellido2' => 'Aguado',
                'dni' => '34549256J',
                'email' => 'socio@example.com',
                'telefono' => '643434443',
                'direccion' => 'Calle Socio, 2',
                'password' => Hash::make('password'),
                'rol' => 'socio',
                'activo' => true,
                'nivel' => 2.0,  // Nivel de pádel
                'sexo' => 'M',
                'email_verified_at' => now(),
                'created_at' => now(), // Añadir la fecha de creación
                'updated_at' => now(), // También actualizar el campo updated_at
            ],
            [
                'nombre' => 'Carlos',
                'apellido1' => 'Lopez',
                'apellido2' => 'Martínez',
                'dni' => '44649884F',
                'email' => 'carlos@example.com',
                'telefono' => '643434346',
                'direccion' => 'Calle Carlos, 3',
                'password' => Hash::make('password'),
                'rol' => 'socio',
                'activo' => true,
                'nivel' => 1.5,  // Nivel de pádel
                'sexo' => 'M',
                'email_verified_at' => now(),
                'created_at' => now(), // Añadir la fecha de creación
                'updated_at' => now(), // También actualizar el campo updated_at
            ],
            [
                'nombre' => 'Laura',
                'apellido1' => 'González',
                'apellido2' => 'Ramírez',
                'dni' => '35172900N',
                'email' => 'laura@example.com',
                'telefono' => '643434343',
                'direccion' => 'Calle Laura, 4',
                'password' => Hash::make('password'),
                'rol' => 'admin',
                'activo' => true,
                'nivel' => 4.0,  // Nivel de pádel
                'sexo' => 'F',
                'email_verified_at' => now(),
                'created_at' => now(), // Añadir la fecha de creación
                'updated_at' => now(), // También actualizar el campo updated_at
            ],
        ]);
    }
}
