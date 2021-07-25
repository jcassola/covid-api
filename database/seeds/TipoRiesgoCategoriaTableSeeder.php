<?php

use App\TipoRiesgoCategoria;
use Illuminate\Database\Seeder;

class TipoRiesgoCategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TipoRiesgoCategoria::class)->create([
            'nombre' => 'BAJO RIESGO',
        ]);
        factory(TipoRiesgoCategoria::class)->create([
            'nombre' => 'MEDIANO RIESGO',
        ]);
        factory(TipoRiesgoCategoria::class)->create([
            'nombre' => 'ALTO RIESGO',
        ]);
    }
}
