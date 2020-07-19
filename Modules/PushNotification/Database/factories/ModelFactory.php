<?php

use Faker\Generator as Faker;
use  Modules\PushNotification\Entities\PushNotification;

$factory->define(PushNotification::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence
    ];
});
