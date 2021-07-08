<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Habitacion;
use Faker\Generator as Faker;

$factory->define(Habitacion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'capacidad' => $faker->numberBetween(8, 10),
        'en_uso' => $faker->numberBetween(5, 7),
        'disponible' => $faker->boolean([50])
    ];
});
