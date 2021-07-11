<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteIngresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_ingresados', function (Blueprint $table) {
            $table->bigIncrements('id_ingresado')->autoIncrement();
            $table->unsignedBigInteger('id_habitacion');
            $table->dateTime('fecha_ingreso');
            $table->dateTime('fecha_alta')->nullable();
            $table->boolean('estado_ingreso')->default(1);
            $table->timestamps();

            $table->foreign('id_habitacion')
                ->references('id_habitacion')
                ->on('habitaciones')
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
        Schema::dropIfExists('paciente_ingresados');
    }
}
