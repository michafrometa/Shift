<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PostCollection::class, function (Faker $faker) {
    return [
        'neighborhood_id' => $faker->numberBetween(1,25)
    ];
});
