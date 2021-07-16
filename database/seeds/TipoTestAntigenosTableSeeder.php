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
            'nombre' => 'POSITIVO',
        ]);
        factory(TipoTestAntigeno::class)->create([
            'nombre' => 'NEGATIVO',
        ]);
        factory(TipoTestAntigeno::class)->create([
            'nombre' => 'NO REALIZADO',
        ]);
    }
}
