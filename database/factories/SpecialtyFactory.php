<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Specialty::class, function (Faker $faker) {
    return [
        'name' => 'Specialty ' . $faker->randomNumber(),
        'description' => $faker->text
    ];
});
