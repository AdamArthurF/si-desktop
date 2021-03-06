<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dosen;
use Faker\Generator as Faker;

$factory->define(Dosen::class, function (Faker $faker) {
    return [
        'nidn' => $faker->randomNumber(8),
        'nama_dosen' => $faker->name,
        'created_at' => now()
    ];
});
