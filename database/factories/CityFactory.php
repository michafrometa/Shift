<?php

use Faker\Generator as Faker;

$factory->define(App\Models\City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'description' => $faker->text,
        'federated_unit' => $faker->lexify('??'),
    ];
});
