<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define( Customer::class, function ( Faker $faker ) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'dni' => $faker->randomNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
    ];
} );
