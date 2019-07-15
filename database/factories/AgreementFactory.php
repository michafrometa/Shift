<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Agreement::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});
