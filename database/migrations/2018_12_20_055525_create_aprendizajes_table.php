<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAprendizajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendizajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_profesor');
            $table->integer('cantidad_estudiantes');
            $table->string('nombre_socio');
            $table->string('semestreaño');
            $table->integer('asignaturaid');
            $table->integer('indicadorid')->unsigned()->nullable();
            $table->foreign('indicadorid')->references('id')
                ->on('indicadores')->onDelete('cascade');
            $table->timestamps();
        });

       /*
        *  Schema::create('aprendizajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_profesor');
            $table->integer('cantidad_estudiantes');
            $table->string('nombre_socio');
            $table->string('semestreaño');
            $table->integer('asignaturaid')->unsigned()->nullable();
            $table->integer('indicadorid')->unsigned()->nullable();
            $table->foreign('asignaturaid')->references('id')
                ->on('asignaturas')->onDelete('cascade');
            $table->foreign('indicadorid')->references('id')
                ->on('indicadores')->onDelete('cascade');
            $table->timestamps();
        });
       */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprendizajes');
    }
}
