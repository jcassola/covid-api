<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MunicipioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // VILLA CLARA
            [
                'nombre' => 'Corralillo',
                'codigo' => 2601,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Quemado de Güines',
                'codigo' => 2602,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Sagua la Grande',
                'codigo' => 2603,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Encrucijada',
                'codigo' => 2604,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Camajuaní',
                'codigo' => 2605,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Caibarién',
                'codigo' => 2606,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Remedios',
                'codigo' => 2607,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Placetas',
                'codigo' => 2608,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Santa Clara',
                'codigo' => 2609,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Cifuentes',
                'codigo' => 2610,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Santo Domingo',
                'codigo' => 2611,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Ranchuelo',
                'codigo' => 2612,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Manicaragua',
                'codigo' => 2613,
                'id_provincia' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];


        DB::table('municipio')->insert($data);
    }
}
