<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Series;
use Faker\Generator as Faker;

$factory->define(Series::class, function (Faker $faker) {
    return [
        'title' => $faker -> sentence(),
        'author' => $faker -> name(),
        'release_date' => $faker -> date(),
        'rating' => $faker -> numberBetween(0, 5)
    ];
});
