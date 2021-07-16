<?php

use App\TipoTestAntigeno;
use Illuminate\Database\Seeder;

class TipoTestAntigenosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TipoTestAntigeno::class)->create([
            'nombre' => 'Positivo',
        ]);
        factory(TipoTestAntigeno::class)->create([
            'nombre' => 'Negativo',
        ]);
        factory(TipoTestAntigeno::class)->create([
            'nombre' => 'No realizado',
        ]);
    }
}
