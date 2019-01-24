<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtcAprendizajeMasServsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atc_aprendizaje_mas_servs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesor_id1')->unsigned()->nullable();
            $table->integer('profesor_id2')->unsigned()->nullable();
            $table->integer('cantidad_estudiantes');
            $table->string('nombre_socio');
            $table->string('semestreaño');
            $table->integer('asignaturaid');
            $table->integer('Indicadores_id')->unsigned()->nullable();
            $table->foreign('Indicadores_id')->references('id')
                ->on('indicadores')->onDelete('cascade');
            $table->timestamps();
            $table->foreign('profesor_id1')->references('id')
                ->on('profesores')->onDelete('cascade');
            $table->foreign('profesor_id2')->references('id')
                ->on('profesores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atc_aprendizaje_mas_servs');
    }
}
