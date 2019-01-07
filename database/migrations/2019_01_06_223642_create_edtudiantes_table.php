<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdtudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edtudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rut');
            $table->string('carrera');
            $table->integer('actividad_tit_conid')->unsigned()->nullable();
            $table->foreign('actividad_tit_conid')->references('id')
                ->on('actividad_titulados_convenios')->onDelete('cascade');
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
        Schema::dropIfExists('edtudiantes');
    }
}
