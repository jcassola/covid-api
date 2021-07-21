<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_salud', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100);
            $table->string('codigo',10);
            $table->integer('tipo');
            $table->string('separador',10);
            $table->unsignedBigInteger('id_municipio');
            $table->unsignedBigInteger('id_provincia');
            $table->timestamps();

            $table->foreign('id_provincia')
                ->references('id')
                ->on('provincia')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_municipio')
                ->references('id')
                ->on('municipio')
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
        Schema::dropIfExists('area_salud');
    }
}
