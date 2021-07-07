<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('id_area')->autoIncrement();;
            $table->unsignedBigInteger('id_centro');
            $table->string('nombre', 100);
            $table->string('categoria', 100);
            $table->timestamps();

            $table->foreign('id_centro')
                ->references('id_centro')
                ->on('centros')
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
        Schema::dropIfExists('areas');
    }
}
