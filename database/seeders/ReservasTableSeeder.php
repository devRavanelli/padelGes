<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar 10 reservas con fechas sin horas
        DB::table('reservas')->insert([
            [
                'fecha' => '2025-01-18', // Solo la fecha, sin hora
                'id_franja' => 1,
                'id_pista' => 1,
                'id_usuario' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-19', // Solo la fecha, sin hora
                'id_franja' => 2,
                'id_pista' => 2,
                'id_usuario' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-20', // Solo la fecha, sin hora
                'id_franja' => 3,
                'id_pista' => 3,
                'id_usuario' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-21', // Solo la fecha, sin hora
                'id_franja' => 1,
                'id_pista' => 4,
                'id_usuario' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-22', // Solo la fecha, sin hora
                'id_franja' => 2,
                'id_pista' => 5,
                'id_usuario' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-23', // Solo la fecha, sin hora
                'id_franja' => 3,
                'id_pista' => 6,
                'id_usuario' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-24', // Solo la fecha, sin hora
                'id_franja' => 1,
                'id_pista' => 2,
                'id_usuario' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-25', // Solo la fecha, sin hora
                'id_franja' => 2,
                'id_pista' => 1,
                'id_usuario' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-26', // Solo la fecha, sin hora
                'id_franja' => 3,
                'id_pista' => 3,
                'id_usuario' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-01-27', // Solo la fecha, sin hora
                'id_franja' => 1,
                'id_pista' => 5,
                'id_usuario' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
