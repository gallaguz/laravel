<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
//use Faker\Generator as Faker;

$factory->define(News::class, function () {

    $faker = \Faker\Factory::create('ru_RU');

    return [
        'title' => $faker->realText(rand(20,50)),
        'text' => $faker->realText(rand(100,3000)),
        'category_id' => rand(1,10),
        'isPrivate' => 0
        //'isPrivate' => rand(0,1)
    ];
});
