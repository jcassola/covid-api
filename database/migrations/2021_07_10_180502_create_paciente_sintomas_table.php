<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_sintomas', function (Blueprint $table) {
            $table->bigIncrements('id_sintomas')->autoIncrement();
            $table->unsignedBigInteger('id_paciente');
            $table->dateTime('fecha_sintomas')->nullable();
            $table->boolean('fiebre')->default(false);
            $table->boolean('rinorrea')->default(false);
            $table->boolean('congestion_nasal')->default(false);
            $table->boolean('tos')->default(false);
            $table->boolean('expectoracion')->default(false);
            $table->boolean('dificultad_respiratoria')->default(false);
            $table->boolean('cefalea')->default(false);
            $table->boolean('dolor_garganta')->default(false);
            $table->string('otros_sint', 100);
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
        Schema::dropIfExists('paciente_sintomas');
    }
}
