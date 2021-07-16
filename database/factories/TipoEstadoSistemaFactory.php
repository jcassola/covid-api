<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoEstadoSistema;
use Faker\Generator as Faker;

$factory->define(TipoEstadoSistema::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});
