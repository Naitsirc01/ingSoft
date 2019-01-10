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
            $table->integer('Extension_id')->unsigned()->nullable();
            $table->integer('actividad_definida_id')->unsigned()->nullable();
            $table->integer('aprendizaje_id')->unsigned()->nullable();
            $table->foreign('Registroconvenio_id')->references('id')
                ->on('actividad_convenios')->onDelete('cascade');
            $table->foreign('Extension_id')->references('id')
                ->on('actividad_extensions')->onDelete('cascade');
            $table->foreign('actividad_definida_id')->references('id')
                ->on('actividad_definidas')->onDelete('cascade');
            $table->foreign('aprendizaje_id')->references('id')
                ->on('aprendizajes')->onDelete('cascade');
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
