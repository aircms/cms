<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
    ];
});

$factory->define(\App\Models\Post\Content::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
    ];
});
