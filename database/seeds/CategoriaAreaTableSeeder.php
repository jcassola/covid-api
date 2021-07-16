<?php

use App\CategoriaArea;
use Illuminate\Database\Seeder;

class CategoriaAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoriaArea::class)->create([
            'nombre' => 'CONFIRMADO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'SOSPECHOSO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'CONTACTO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'SOSPECHOSO ALTO RIESGO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'CONFIRMADO ALTO RIESGO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'CONTACTO ALTO RIESGO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'GESTANTE',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'NIÑO CONTACTO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'NIÑO SOSPECHOSO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'NIÑO CONFIRMADO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'VIAJERO EXTRANJERO',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'VIAJERO NACIONAL',
        ]);
        factory(CategoriaArea::class)->create([
            'nombre' => 'INGRESO EN DOMICILIO',
        ]);

    }
}
