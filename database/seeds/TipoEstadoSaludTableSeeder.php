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
            'nombre' => 'De Cuidado',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'Grave',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'Crítico Estable',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'Crítico Inestable',
        ]);
        factory(TipoEstadoSalud::class)->create([
            'nombre' => 'Fallecido',
        ]);
    }
}
