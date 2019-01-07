<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadTituladosConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_titulados_convenios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->date('fecha_de_inicio');
            $table->date('decha_de_termino')->nullable();
            $table->string('ProfesorGuia');
            $table->string('ProfesorGuia2')->nullable();
            $table->string('empresa');
            $table->integer('indicadorid')->unsigned()->nullable();
            $table->foreign('indicadorid')->references('id')
                ->on('indicadores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_titulados_convenios');
    }
}
