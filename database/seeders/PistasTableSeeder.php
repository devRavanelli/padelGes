<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar datos en la tabla pistas
        $pistas = [
            ['nombre_pista' => 'Pista 1'],
            ['nombre_pista' => 'Pista 2'],
            ['nombre_pista' => 'Pista 3'],
            ['nombre_pista' => 'Pista 4'],
            ['nombre_pista' => 'Pista 5'],
            ['nombre_pista' => 'Pista 6'],
        ];

        // Insertar los datos en la tabla 'pistas'
        DB::table('pistas')->insert($pistas);
    }
}

