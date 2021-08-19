<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Camp;
use Faker\Generator as Faker;

$factory->define(Camp::class, function (Faker $faker) {
    return [
            'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'date' => $faker->date($format='Y-m-d',$max='now'),
        'title' => $faker->text(10),
        'discription' => $faker->text(20),
        'location' => $faker->text(10),
    ];
});
