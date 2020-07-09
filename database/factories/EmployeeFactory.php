<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
	
		$doj = $faker->dateTime($max = 'now', $timezone = null);

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'date_of_joining' => $doj,
        'current_ctc' => $faker->numberBetween(25000, 40000),
        'date_of_relieving' => $faker->date($doj->format('Y-m-d'), '+30 days'),
    ];
});
