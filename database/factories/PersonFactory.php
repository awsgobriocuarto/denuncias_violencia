<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {

    $fname = $faker->firstName;
    $lname = $faker->lastName;

    // static $dni_number = 10000000;
    
    return [
        // 'dni' => $dni_number++,
        'dni' => $faker->unique()->numberBetween(6000000, 50000000),
        'fname' => $fname,
        'lname' => $lname,
        'gender' => $faker->randomElement([1, 8]),
        'created_at' =>date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s'),
    ];
});
