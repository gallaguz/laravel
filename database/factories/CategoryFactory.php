<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
//use Faker\Generator as Faker;

$factory->define(Category::class, function () {

    $faker = \Faker\Factory::create('ru_RU');

    return [
        'category' => $faker->word(),
        'name' => $faker->realText(rand(20,50))
    ];
});
