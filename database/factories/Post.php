<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post\Type\Type::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});

$factory->define(\App\Models\Post\Post::class, function (Faker $faker) {
    return [
        'title'  => $faker->text(100),
        'slug'   => $faker->unique()->slug,
        'status' => $faker->randomKey(\App\Models\Post\PostStatus::descriptions()),
    ];
});

$factory->define(\App\Models\Post\Type\Layout::class, function (Faker $faker) {
    return [
        'layout' => 'default',
    ];
});
