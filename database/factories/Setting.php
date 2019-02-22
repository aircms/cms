<?php

use Faker\Generator as Faker;

$factory->define(\aircms\settings\Models\Setting::class, function (Faker $faker) {
    return [
        'alias'       => strtolower($faker->unique()->firstName()),
        'name'        => $faker->name(),
        'hint'        => $faker->text(100),
        'type'        => strtolower($faker->firstName),
        'pre_setting' => $faker->text(),
        'value'       => $faker->randomNumber(),
        'order'       => $faker->randomNumber(),
    ];
});

$factory->define(\aircms\groupable\Models\Group::class, function (Faker $faker) {
    return [
        'alias'       => strtolower($faker->unique()->firstName),
        'name'        => $faker->name,
        'order'       => $faker->randomNumber(),
        'description' => $faker->text('80'),
    ];
});
