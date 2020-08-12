<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Url;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Url::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'token' => Str::slug(Str::random(9), '-'),
        'external' => $faker->url,
        'enabled'   => true
    ];
});
