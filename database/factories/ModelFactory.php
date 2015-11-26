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
        'name' => $faker->company,
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

    //$tag_id = json_decode(json_encode(DB::table('tags')->select('id')->distinct()->get(), true));
    //$ticket_id = DB::table('ticket')->select('id')->get();

    $tag_id = DB::table('tags')->lists('id');
    $ticket_id = DB::table('ticket')->lists('id');


    //print_r($tag_id);

    return [
        'id_tag' => $faker->randomElement($tag_id),
        'id_ticket' => $faker->randomElement($ticket_id),
        //'id_tag' => array_rand($tag_id),
        //'id_ticket' => array_rand($ticket_id),
    ];
});
