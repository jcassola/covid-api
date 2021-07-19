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
        $this->call(PacienteCategoriasTableSeeder::class);
        $this->call(TipoEstadoSaludTableSeeder::class);
        $this->call(TipoEstadoSistemaTableSeeder::class);
        $this->call(TipoTestAntigenosTableSeeder::class);
        $this->call(CategoriaAreaTableSeeder::class);

        $this->call(ProvinciaTableSeeder::class);
        $this->call(MunicipioTableSeeder::class);
        $this->call(AreaSaludTableSeeder::class);

        // $this->call(AreasTableSeeder::class);
        // $this->call(CentrosTableSeeder::class);


    }
}
