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
            'nombre' => 'Encuestado',
        ]);
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'Pendiente Ingreso',
        ]);
        factory(TipoEstadoSistema::class)->create([
            'nombre' => 'Ingresado',
        ]);
    }
}
