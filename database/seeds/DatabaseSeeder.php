<?php

use Illuminate\Database\Seeder;
use App\Centro;
use App\Area;
use App\Habitacion;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(CentrosTableSeeder::class);
        // $this->call(AreasTableSeeder::class);


        // Create 10 records of centros
        $centros = factory(Centro::class, 10)->create()->each(function ($centro) {
            // Seed the relation with 3 areas
            $centro->areas()->saveMany(factory(Area::class, 5)->make());
        });

        // $centros->each(function ($centro){
        //     $centro->areas->each(function ($area){
        //         $area->habitaciones()->saveMany(factory(Habitacion::class, 5)->make());
        //     });
        // });

    }
}
