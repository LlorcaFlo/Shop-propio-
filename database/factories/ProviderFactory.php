<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
   return [
      'name' => $faker->name,
   ];
} );
