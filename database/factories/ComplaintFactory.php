<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Complaint;
use App\Person;
use App\Portal;
use App\User;
use Faker\Generator as Faker;

$factory->define(Complaint::class, function (Faker $faker) {

    $person_id = $faker->randomElement(Person::pluck('id'));
    $portal_id = $faker->randomElement(Portal::pluck('id'));
    $user_id = $faker->randomElement(User::where('portal_id', $portal_id )->pluck('id'));
    
    return [
        'person_id' => $person_id,
        'portal_id' => $portal_id,
        'user_id' => $user_id,
        'type_of_violence' => $faker->numberBetween(1, 8),
    ];
});
