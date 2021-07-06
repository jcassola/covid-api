<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use App\Centro;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {
    return [
        'id_centro' => factory(Centro::class),
        'nombre' => $faker->name,
        'categoria' => $faker->randomElement(array('Alto Riesgo', 'Sospechosos', 'Positivos')),
    ];
});
