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
            $table->unsignedBigInteger('id_ingresado');
            $table->boolean('test_antigeno')->default(0);
            $table->boolean('vacunado')->default(0);
            $table->string('nombre', 100);
            $table->integer('edad');
            $table->string('ci', 11);
            $table->char('sexo', 1);
            $table->string('direccion', 100);
            $table->string('municipio', 100);
            $table->string('provincia', 100);
            $table->string('cmf', 10);
            $table->string('remite_caso', 10);
            $table->string('hospital', 100);
            $table->string('estado_salud', 100);
            $table->string('estado_sistema', 100);
            $table->boolean('trabajador_salud')->default(0);
            $table->timestamps();

            $table->foreign('id_ingresado')
            ->references('id_ingresado')
            ->on('pacientes_ingresados')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
