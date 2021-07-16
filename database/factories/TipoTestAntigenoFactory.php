<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoTestAntigeno;
use Faker\Generator as Faker;

$factory->define(TipoTestAntigeno::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});
