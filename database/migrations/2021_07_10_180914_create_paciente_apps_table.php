<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_apps', function (Blueprint $table) {
            $table->bigIncrements('id_app')->autoIncrement();
            $table->unsignedBigInteger('id_paciente');
            $table->boolean('hipertension')->default(false);
            $table->boolean('diabetes')->default(false);
            $table->boolean('asma')->default(false);
            $table->boolean('obesidad')->default(false);
            $table->boolean('insuficiencia_renal')->default(false);
            // $table->boolean('embarazo')->default(false);
            // $table->boolean('ninho')->default(false);
            $table->boolean('oncologia')->default(false);
            $table->string('otros_apps', 100);
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
        Schema::dropIfExists('paciente_apps');
    }
}
