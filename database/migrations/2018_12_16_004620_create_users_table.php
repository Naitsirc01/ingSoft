<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email');
            $table->string('rut')->unique();
            $table->integer('departamento_id')->unsigned()->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('tipo_usuarioid')->unsigned()->nullable();
            $table->foreign('departamento_id')->references('id')
                ->on('departamentos')->onDelete('cascade');
            $table->foreign('tipo_usuarioid')->references('id')
                ->on('tipo_usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
