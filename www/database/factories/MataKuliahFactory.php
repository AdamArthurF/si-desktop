<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MataKuliah;
use Faker\Generator as Faker;

$factory->define(MataKuliah::class, function (Faker $faker) {
    return [
        'nama_matkul' => $faker->jobTitle,
        'created_at' => now()
    ];
});
