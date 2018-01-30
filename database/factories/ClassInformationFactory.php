<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\ClassInformation::class, function (Faker $faker) {
    return [
        'date_start' => $faker->date(),
        'date_end' => $faker->date(),
        'name' => rand(1, 4),
        'semester' => rand(1,2),
        'year' => rand(2017,2030),
    ];
});
