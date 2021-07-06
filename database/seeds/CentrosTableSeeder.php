<?php

use Illuminate\Database\Seeder;
use App\Centro;

class CentrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Centro::class, 10)->create();
    }
}
