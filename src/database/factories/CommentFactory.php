<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Camp;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'camp_id' => function() {
            return factory(Camp::class)->create()->id;
        },
        'comment' => $faker->text(20),
    ];
});
