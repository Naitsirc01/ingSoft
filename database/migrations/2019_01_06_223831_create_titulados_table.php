<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTituladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rut');
            $table->integer('telefono')->unsigned()->nullable();
            $table->string('correo')->nullable();
            $table->string('empresa')->nullable();
            $table->date('año_titulacion');
            $table->string('carrera');
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
        Schema::dropIfExists('titulados');
    }
}
