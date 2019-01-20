<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('meta_descripcion')->nullable();
            $table->string('tipo_de_calculo')->nullable();
            $table->integer('parametro1')->nullable();
            $table->integer('parametro2')->nullable();
            $table->string('tipo1')->nullable();
            $table->string('tipo2')->nullable();
            $table->integer('meta1');
            $table->integer('meta2')->unsigned()->nullable();
            $table->date('año_meta');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('indicadores');
    }
}
