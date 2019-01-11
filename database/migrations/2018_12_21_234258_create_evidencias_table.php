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
            $table->string('archivo');
            $table->integer('Registroconvenio_id')->unsigned()->nullable();
            $table->integer('atc_extension_id')->unsigned()->nullable();
            $table->integer('actividad_definida_id')->unsigned()->nullable();
            $table->integer('atc_aprendizaje_mas_serv_id')->unsigned()->nullable();
            $table->integer('atc_titulacion_con_id')->unsigned()->nullable();
            $table->foreign('Registroconvenio_id')->references('id')
                ->on('registroconvenios')->onDelete('cascade');
            $table->foreign('atc_extension_id')->references('id')
                ->on('atc_extensions')->onDelete('cascade');
            $table->foreign('actividad_definida_id')->references('id')
                ->on('actividad_definidas')->onDelete('cascade');
            $table->foreign('atc_aprendizaje_mas_serv_id')->references('id')
                ->on('atc_aprendizaje_mas_servs')->onDelete('cascade');
            $table->foreign('atc_titulacion_con_id')->references('id')
                ->on('atc_titulacion_cons')->onDelete('cascade');
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
