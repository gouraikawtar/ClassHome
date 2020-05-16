<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TeachingClass;
use Faker\Generator as Faker;

$factory->define(TeachingClass::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'section' => $faker->text(15),
        'object'=>$faker->text(15),
        'description'=>$faker->text(15),
        'code'=>$faker->regexify('[A-Za-z0-9]{6}'),
        'user_id'=>$faker->factory(App\User::class)->where('role','teacher'),
    ];
});
