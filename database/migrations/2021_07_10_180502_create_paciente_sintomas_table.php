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
            $table->boolean('fiebre')->default(0);
            $table->boolean('rinorrea')->default(0);
            $table->boolean('congestion_nasal')->default(0);
            $table->boolean('tos')->default(0);
            $table->boolean('expectoracion')->default(0);
            $table->boolean('dificultad_respiratoria')->default(0);
            $table->boolean('cefalea')->default(0);
            $table->boolean('dolor_garganta')->default(0);
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
