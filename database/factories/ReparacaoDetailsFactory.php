<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reparacao_Details;
use Faker\Generator as Faker;

$factory->define(Reparacao_Details::class, function (Faker $faker) {
    return [
        'reparacao_id' => factory(\App\Reparacao::class)->create()->id,
        'dynamic_id' => factory(\App\Dynamic::class)->create()->id,
        'nome' => $faker->sentence,
        'qtd' => $faker->number,
        'preco' => $faker->number,


    ];
});
