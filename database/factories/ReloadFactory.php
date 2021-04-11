<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reload;
use Faker\Generator as Faker;

$factory->define(Reload::class, function (Faker $faker) {
    return [
        'count_drum' => $faker->randomDigit,
        'price' => $faker->randomDigit,
        'price_total' => $faker->randomDigit
    ];
});
