<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Veiculo;
use Faker\Generator as Faker;

$factory->define(Veiculo::class, function (Faker $faker) {
    return [
        'matricula' => $faker->name,
        'marca' => $faker->company,
        'modelo' => $faker->company,
        'ano' => $faker->year,
        'obs' => $faker->sentence,
        'cliente_id' => factory(\App\Cliente::class)->create()->id,
    ];
});
