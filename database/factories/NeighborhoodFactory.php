<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Neighborhood::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'description' => $faker->text,
        'city_id' => $faker->numberBetween(1,25)
    ];
});
