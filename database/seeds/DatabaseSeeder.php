<?php

use Illuminate\Database\Seeder;
use App\Centro;
use App\Area;
use App\DatosPaciente;
use App\Habitacion;
use App\PacienteApp;
use App\PacienteContacto;
use App\PacienteSintomas;

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

        //Esto es para crear las habitaciones dentro de las areas asociadas a los centros.
        //Deberia pinchar, pero no lo hace :v
        // $centros->each(function ($centro){
        //     $centro->areas->each(function ($area){
        //         $area->habitaciones()->saveMany(factory(Habitacion::class, 5)->make());
        //     });
        // });

        //Para llenar las tablas de pacientes. Hay que definir los factories
        // factory(DatosPaciente::class, 10)->create()->each(function ($paciente) {
        //     // Seed the relation with 10 patients
        //     $paciente->apps()->save(factory(PacienteApp::class)->make());
        //     $paciente->sintomas()->save(factory(PacienteSintomas::class)->make());
        //     $paciente->contactos()->save(factory(PacienteContacto::class)->make());
        // });

    }
}
