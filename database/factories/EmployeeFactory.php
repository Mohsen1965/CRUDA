<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Eemployee;
use Faker\Generator as Faker;

$factory->define(Eemployee::class, function (Faker $faker) {
    return [
      'first_name' => $faker->firstName,
      'last_name' => $faker->lastName,
      'gender' => $faker->randomElement(["male", "female"]),
      'email' => $faker->unique()->safeEmail,
      'phone' => $faker->phoneNumber,
      'image' => $faker->image,

    ];
});
