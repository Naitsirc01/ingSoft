<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_extensions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('expositor');
            $table->date('fecha');
            $table->string('ubicacion');
            $table->integer('cantidad_asistentes');
            $table->string('organizador');
            $table->integer('tipo_extension');
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
        Schema::dropIfExists('actividad_extensions');
    }
}
