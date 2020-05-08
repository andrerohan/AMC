<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reparacao;
use Faker\Generator as Faker;

$factory->define(Reparacao::class, function (Faker $faker) {
    return [
        'data' => $faker->date,
        'obs' => $faker->sentence,
        'veiculo_id' => factory(\App\Veiculo::class)->create()->id,
    ];
});
