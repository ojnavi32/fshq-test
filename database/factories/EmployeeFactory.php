<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'company_id' => rand(1, 100),
        'user_id' => rand(1, 100),
        'phone' => $faker->phoneNumber
    ];
});
