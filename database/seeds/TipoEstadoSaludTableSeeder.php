<?php

use App\TipoEstadoSalud;
use Illuminate\Database\Seeder;

class TipoEstadoSaludTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'DE CUIDADO',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'GRAVE',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'CRITICO ESTABLE',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'CRITICO INESTABLE',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'FALLECIDO',
        ]);
    }
}
