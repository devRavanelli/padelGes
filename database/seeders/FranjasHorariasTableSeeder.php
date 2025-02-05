<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FranjasHorariasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Horarios disponibles para las franjas horarias
        $horarios = [
            ['hora_inicio' => '09:00:00'],
            ['hora_inicio' => '10:30:00'],
            ['hora_inicio' => '12:00:00'],
            ['hora_inicio' => '13:30:00'],
            ['hora_inicio' => '15:00:00'],
            ['hora_inicio' => '16:30:00'],
            ['hora_inicio' => '18:00:00'],
            ['hora_inicio' => '19:30:00'],
            ['hora_inicio' => '21:00:00'],
        ];

        // Insertar los datos en la tabla franjas_horarias
        DB::table('franjas_horarias')->insert($horarios);
    }
}
