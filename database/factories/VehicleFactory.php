<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'plate' 	=> strtoupper(Str::random(6)),
        'color' 	=> strtoupper($faker->text(6)),
        'model' 	=> strtoupper($faker->text(6)),
        'mark' 		=> strtoupper($faker->text(6)),
        'comment' 	=> strtoupper($faker->sentence),
    ];
});
