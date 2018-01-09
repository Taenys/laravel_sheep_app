<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
// crée une date au bon format pour la base de données



$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $faker = \Faker\Factory::create('fr_FR');

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone'=> $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
