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

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        //'name' => $faker->company,
        'name' => $faker->fileExtension,
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

$factory->define(App\Tag_Ticket::class, function (Faker\Generator $faker) {

    $tag_id = DB::table('tags')->lists('id');
    $ticket_id = DB::table('ticket')->lists('id');

    return [
        'id_tag' => $faker->randomElement($tag_id),
        'id_ticket' => $faker->randomElement($ticket_id),
    ];
});

$factory->define(App\Reply::class, function (Faker\Generator $faker) {

    $user_id = DB::table('tags')->lists('id');
    $ticket_id = DB::table('ticket')->lists('id');

    return [
        'comment' => $faker->text,
        'id_user' => $faker->randomElement($user_id),
        'id_ticket' => $faker->randomElement($ticket_id),
    ];
});
