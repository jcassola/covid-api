<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosArribosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_arribos', function (Blueprint $table) {
            $table->bigIncrements('id_arribo')->autoIncrement();
            $table->unsignedBigInteger('id_paciente');
            $table->string('pais_procedencia', 100)->nullable();
            $table->string('lugar_estancia', 100)->nullable();
            $table->dateTime('fecha_arribo')->nullable();
            $table->timestamps();

            $table->foreign('id_paciente')
            ->references('id_paciente')
            ->on('datos_paciente')
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
        Schema::dropIfExists('datos_arribos');
    }
}
