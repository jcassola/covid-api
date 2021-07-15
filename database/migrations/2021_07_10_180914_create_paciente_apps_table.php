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
            $table->boolean('hipertension')->default(0);
            $table->boolean('diabetes')->default(0);
            $table->boolean('asma')->default(0);
            $table->boolean('obesidad')->default(0);
            $table->boolean('insuficiencia_renal')->default(0);
            // $table->boolean('embarazo')->default(0);
            // $table->boolean('ninho')->default(0);
            $table->boolean('oncologia')->default(0);
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
