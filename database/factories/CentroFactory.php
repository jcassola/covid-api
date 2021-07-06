<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Centro;
use Faker\Generator as Faker;

$factory->define(Centro::class, function (Faker $faker) {
    return [
        'nombre_centro' => $faker->name,
        'municipio' => $faker->randomElement(array('Santa Clara', 'Sagua', 'Remedios', 'Placetas')),
        'organismo' => $faker->randomElement(array('MES', 'MINED', 'MINSAP')),
        // 'categoria' => $faker->randomElement(array('Alto Riesgo', 'Sospechosos', 'Positivos')),
    ];
});
