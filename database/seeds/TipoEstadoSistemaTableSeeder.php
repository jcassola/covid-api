<?php

use App\TipoEstadoSistema;
use Illuminate\Database\Seeder;

class TipoEstadoSistemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'ENCUESTADO',
        ]);
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'PENDIENTE INGRESO',
        ]);
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'INGRESADO',
        ]);
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'RECUPERADO',
        ]);
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'RECUPERADO SEGUIMIENTO',
        ]);
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'TRASLADO',
        ]);
    }
}
