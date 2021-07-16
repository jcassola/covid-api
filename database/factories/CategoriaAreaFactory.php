<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriaArea;
use Faker\Generator as Faker;

$factory->define(CategoriaArea::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});
