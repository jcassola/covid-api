<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_contactos', function (Blueprint $table) {
            $table->bigIncrements('id_contactos')->autoIncrement();
            $table->unsignedBigInteger('id_paciente');
            $table->dateTime('fecha_contacto');
            $table->string('tipo_contacto', 100);
            $table->string('lugar_contacto', 100);
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
        Schema::dropIfExists('paciente_contactos');
    }
}
