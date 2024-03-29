<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Chat;
use App\Message;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
    ];
});
$factory->define(Chat::class, function (Faker $faker) {
    return [
        //'name' => $faker->sentence($faker->numberBetween(1, 3)),
    ];
});
$factory->define(Message::class, function (Faker $faker) {
    return [
        'chat' => $faker->numberBetween(1, 5),
        'author' => $faker->numberBetween(1, 10),
        'text' => $faker->sentence($faker->numberBetween(5, 25)),
    ];
});