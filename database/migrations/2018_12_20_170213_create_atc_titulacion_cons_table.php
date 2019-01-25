<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtcTitulacionConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atc_titulacion_cons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('nombre3')->nullable();
            $table->string('nombre4')->nullable();
            $table->string('rut1');
            $table->string('rut2')->nullable();
            $table->string('rut3')->nullable();
            $table->string('rut4')->nullable();
            $table->string('carrera1');
            $table->string('carrera2')->nullable();
            $table->string('carrera3')->nullable();
            $table->string('carrera4')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_termino')->nullable();
            $table->integer('profesor_id1')->unsigned()->nullable();
            $table->integer('profesor_id2')->unsigned()->nullable();
            $table->string('empresa');
            $table->integer('Indicadores_id')->unsigned()->nullable();
            $table->foreign('Indicadores_id')->references('id')
                ->on('indicadores')->onDelete('cascade');
            $table->foreign('profesor_id1')->references('id')
                ->on('profesores')->onDelete('cascade');
            $table->foreign('profesor_id2')->references('id')
                ->on('profesores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atc_titulacion_cons');
    }
}
