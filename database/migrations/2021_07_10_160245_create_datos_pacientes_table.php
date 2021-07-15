<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_paciente', function (Blueprint $table) {
            $table->bigIncrements('id_paciente')->autoIncrement();
            $table->unsignedBigInteger('id_ingresado')->nullable();
            $table->unsignedBigInteger('id_area')->default(1);
            $table->boolean('test_antigeno')->default(0);
            $table->boolean('vacunado')->default(0);
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->integer('edad');
            $table->string('ci', 11);
            $table->char('sexo', 1);
            $table->string('direccion', 100);
            $table->integer('municipio');
            $table->integer('provincia');
            $table->string('cmf', 10)->nullable();
            $table->string('remite_caso', 100)->nullable();
            $table->string('hospital', 100)->nullable();
            $table->boolean('embarazada')->default(0);
            $table->boolean('ninho')->default(0);
            $table->boolean('trabajador_salud')->default(0);
            //FK
            $table->integer('categoria')->nullable();
            $table->integer('estado_salud')->nullable();
            $table->integer('estado_sistema')->nullable();
            $table->timestamps();

            $table->foreign('id_ingresado')
            ->references('id_ingresado')
            ->on('pacientes_ingresados')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            // $table->foreign('id_area')
            // ->references('id_area')
            // ->on('areas_salud')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_pacientes');
    }
}
