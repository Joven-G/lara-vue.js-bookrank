<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence,
       'year' => $faker->year,
       'genre' => $faker->word,
       'author_id' => $faker->numberBetween(1, 100)
    ];
});
