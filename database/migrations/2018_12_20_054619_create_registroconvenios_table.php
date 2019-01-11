<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroconveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroconvenios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->integer('convenioid')->unsigned()->nullable();
            $table->date('fecha_comienzo');
            $table->date('duracion');
            $table->integer('Indicadores_id')->unsigned()->nullable();
            $table->foreign('convenioid')->references('id')
                ->on('convenios')->onDelete('cascade');
            $table->foreign('Indicadores_id')->references('id')
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
        Schema::dropIfExists('registroconvenios');
    }
}
