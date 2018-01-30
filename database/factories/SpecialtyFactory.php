<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\Specialty::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
