<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'specialty_id' => $faker->numberBetween(1,25)
    ];
});
