<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Color::class, function (Faker $faker) {

    return [
        'colorName'=>$faker->safeColorName,
    ];
});
