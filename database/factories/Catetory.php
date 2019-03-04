<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'slug'        => $faker->unique()->slug,
        'description' => $faker->text(50),
    ];
});
