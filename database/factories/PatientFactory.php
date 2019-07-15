<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthdate' => $faker->date,
        'address' => $faker->address,
        'gender_id' => $faker->numberBetween(1,2),
        'neighborhood_id' => $faker->numberBetween(1,25)
    ];
});
