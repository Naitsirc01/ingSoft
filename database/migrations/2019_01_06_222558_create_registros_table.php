<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departamento');
            $table->date('año');
            $table->integer('total_de_actividades');
            $table->integer('cantidad_de_titulados');
            $table->integer('cantidad_de_asistentes');
            $table->integer('cantidad_de_estudiantes');
            $table->integer('cantidad_de_atc_AprServ');
            $table->integer('cantidad_de_atc_extension');
            $table->integer('cantidad_de_atc_registroCon');
            $table->integer('cantidad_de_atc_titulacionCon');
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
        Schema::dropIfExists('registros');
    }
}
