<?php

use Faker\Generator as Faker;

$factory->define(App\Spending::class, function (Faker $faker) {
    return [
        //id-title-price-description-status
        'title' => $faker->sentence(4),
        'price' => $faker->numberBetween(0,3000),
        'description' => $faker->text(),
        'status' => $faker->randomElement(['account', 'paid'])
    ];
});
