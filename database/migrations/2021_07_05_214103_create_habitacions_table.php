<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->bigIncrements('id_habitacion')->autoIncrement();
            $table->unsignedBigInteger('id_area');
            $table->string('nombre', 100);
            $table->integer('capacidad');
            $table->integer('en_usp');
            $table->boolean('disponible')->default(1);
            $table->timestamps();

            $table->foreign('id_area')
                ->references('id_area')
                ->on('areas')
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
        Schema::dropIfExists('habitaciones');
    }
}
