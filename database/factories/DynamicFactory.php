<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dynamic;
use Faker\Generator as Faker;

$factory->define(Dynamic::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'model' => 'Veiculo'
    ];
});
