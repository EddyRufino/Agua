<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Record;
use Faker\Generator as Faker;

$factory->define(Record::class, function (Faker $faker) {
    return [
        'count_drum' => 25,
        'drum_full' => $faker->randomDigit,
        'drum_empty' => $faker->randomDigit
    ];
});
