<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'isbn' => $faker->isbn10,
        'authors' => $faker->name . ',' . $faker->name,
        'number_of_pages' => $faker->numberBetween(100, 500),
        'publisher' => $faker->company,
        'release_date' => $faker->date,
        'country' => $faker->country
    ];
});
