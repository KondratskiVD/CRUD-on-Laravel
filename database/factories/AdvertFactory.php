<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Adverts;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
$factory->define(Adverts::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 20),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'user_id' => $faker->numberBetween(1,5),
    ];
});