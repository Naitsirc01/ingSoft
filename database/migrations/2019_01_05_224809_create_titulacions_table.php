<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('nombre');
            $table->string('rut');
            $table->string('carrera');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('profesor');
            $table->string('empresa');
            $table->integer('indicadorid')->unsigned()->nullable();
            $table->foreign('indicadorid')->references('id')
                ->on('indicadores')->onDelete('cascade');
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
        Schema::dropIfExists('titulacions');
    }
}
