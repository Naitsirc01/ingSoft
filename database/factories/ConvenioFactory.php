<?php

use Faker\Generator as Faker;

<<<<<<< Updated upstream
$factory->define(App\convenio::class, function (Faker $faker) {
    return [
        //
=======
$factory->define(App\Convenio::class, function (Faker $faker) {
    return [
        'nombre_empresa'=>$faker->name,
        'tipo_convenio'=>$faker->company,
        'fecha_inicio'=>$faker->dateTime,
        'fecha_termino'=>$faker->dateTime

>>>>>>> Stashed changes
    ];
});
