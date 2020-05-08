<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
        'contribuinte' => $faker->numberBetween(10000000000,999999999),
        'contacto' => $faker->phoneNumber,
        'morada' => $faker->address,
        'codigopostal' => $faker->postcode,
        'localidade' => $faker->country,
        'obs' => $faker->sentence,
    ];
});
