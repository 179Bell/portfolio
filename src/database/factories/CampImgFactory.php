<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Camp;
use App\CampImg;
use Illuminate\Http\UploadedFile;
use Faker\Generator as Faker;

$factory->define(CampImg::class, function (Faker $faker) {
    
    $file = UploadedFile::fake()->image('avatar.jpg');     
    $path = $file->store('public');                          
    $read_temp_path = str_replace('public/', '/storage/', $path);
    
    return [
        'img_path' => $read_temp_path,
        'camp_id' =>  function() {
            return factory(Camp::class)->create()->id;
        },
    ];
});
