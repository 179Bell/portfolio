<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gear;
use Faker\Generator as Faker;

$factory->define(Gear::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'comment' => $faker->text(10),
        'maker_name' => $faker->text(10),
    ];
});
