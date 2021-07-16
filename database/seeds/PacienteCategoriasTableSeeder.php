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
            'nombre' => 'Sospechoso',
        ]);
        factory(PacienteCategoria::class)->create([
            'nombre' => 'Contacto',
        ]);
        factory(PacienteCategoria::class)->create([
            'nombre' => 'Positivo',
        ]);
    }
}
