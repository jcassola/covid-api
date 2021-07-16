<?php

use App\PacienteCategoria;
use Illuminate\Database\Seeder;

class PacienteCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PacienteCategoria::class)->create([
            'nombre' => 'SOSPECHOSO',
        ]);
        factory(PacienteCategoria::class)->create([
            'nombre' => 'CONTACTO',
        ]);
        factory(PacienteCategoria::class)->create([
            'nombre' => 'POSITIVO',
        ]);
    }
}
