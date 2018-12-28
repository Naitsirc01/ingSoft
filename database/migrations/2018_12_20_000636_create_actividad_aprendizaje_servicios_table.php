<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadAprendizajeServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_aprendizaje_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_profesor');
            $table->integer('cantidad_estudiantes');
            $table->string('nombre_socio');
            $table->string('semestre/año');
            $table->integer('asignaturaid')->unsigned()->nullable();
            $table->integer('indicadorid')->unsigned()->nullable();
            $table->foreign('asignaturaid')->references('id')
                ->on('asignaturas')->onDelete('cascade');
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
        Schema::dropIfExists('actividad_aprendizaje_servicios');
    }
}
