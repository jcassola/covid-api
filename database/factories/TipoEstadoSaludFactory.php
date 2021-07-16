<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoEstadoSalud;
use Faker\Generator as Faker;

$factory->define(TipoEstadoSalud::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});
