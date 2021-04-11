<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'delivery' => $faker->randomDigit,
        'pay' => $faker->randomDigit,
        'debt' => $faker->randomDigit,
        'client_id' => Client::all()->random()->id,
    ];
});
