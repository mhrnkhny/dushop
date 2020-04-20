<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Phone::class, function (Faker $faker) {
    return [
        'number'=>$faker->phoneNumber
    ];
});
