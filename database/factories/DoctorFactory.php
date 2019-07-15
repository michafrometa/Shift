<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Doctor::class, function (Faker $faker) {
    return [
        'specialty_id' => $faker->numberBetween(1,25)
    ];
});
