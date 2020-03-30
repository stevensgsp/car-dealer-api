<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CarDealer;
use Faker\Generator as Faker;

$factory->define( CarDealer::class, function ( Faker $faker ) {
    return [
        'name' => $faker->company,
        'description' => $faker->text,
        'location' => $faker->address,
    ];
} );
