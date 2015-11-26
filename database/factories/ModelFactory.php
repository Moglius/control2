<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'id_role' => 2,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Ticket::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(5),
        'comment' => $faker->text,
        'id_status' => rand(1,2),
        'id_priority' => rand(1,3),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
    ];
});
