<?php

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user_id'       => $faker->numberBetween(0, 100),
        'email'         => $faker->email,
        'phone_number'  => $faker->phoneNumber,
        'name'          => $faker->userName,
        'sex'           => $faker->randomElement([0, 1]),
        'age'           => $faker->numberBetween(25, 80),
        'message'       => $faker->text(),
        'reply'         => $faker->text(),
        'reply_channel' => implode(",", $faker->randomElements([0, 1, 2, 3, 4, 5], 2)),
    ];
});
