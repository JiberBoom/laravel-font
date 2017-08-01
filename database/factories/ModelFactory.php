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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Font::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'size' => random_int(10,50),
        'thumb_url' => $faker->url,
        'preview_url'=>$faker->url,
        'download' => random_int(10,50),
        'language'=>$faker->title,
        'author'=>$faker->name,
        'desc'=>$faker->sentence,
        'font_url'=>$faker->url,
        'rank'=>0,
        'md5'=>$faker->sentence,
        'price'=>random_int(10,50),
        'unique_str'=>$faker->country
    ];
});

$factory->define(App\Models\Language::class, function (Faker\Generator $faker) {

    return [
        'code' => $faker->firstName,
        'desc' => $faker->jobTitle,
        'category' => $faker->country,
    ];
});
