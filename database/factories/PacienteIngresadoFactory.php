<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PacienteIngresado;
use Faker\Generator as Faker;

$factory->define(PacienteIngresado::class, function (Faker $faker) {
    return [
        // 'nombre' => $faker->name,
        'fecha_ingreso' => $faker->dateTime,
        'fecha_alta' => $faker->dateTime,
        'estado_ingreso' => $faker->boolean([50])
    ];
});
