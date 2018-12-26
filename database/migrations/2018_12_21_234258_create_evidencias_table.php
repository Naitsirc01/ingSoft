<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('archivo');
            $table->integer('actividad_convenioid')->unsigned()->nullable();
            $table->integer('actividad_extensionid')->unsigned()->nullable();
            $table->integer('actividad_definidaid')->unsigned()->nullable();
            $table->integer('actividad_a+sid')->unsigned()->nullable();
            $table->foreign('actividad_convenioid')->references('id')
                ->on('actividad_convenios')->onDelete('cascade');
            $table->foreign('actividad_extensionid')->references('id')
                ->on('actividad_extensions')->onDelete('cascade');
            $table->foreign('actividad_definidaid')->references('id')
                ->on('actividad_definidas')->onDelete('cascade');
            $table->foreign('actividad_a+sid')->references('id')
                ->on('actividad_aprendizaje_servicios')->onDelete('cascade');
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
        Schema::dropIfExists('evidencias');
    }
}
