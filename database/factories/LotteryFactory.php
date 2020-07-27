<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lottery;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Helper\RandomHelper;
use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(Lottery::class, function (Faker $faker) {
    $datetime = date("Y-m-d H:i:s", strtotime("+1 hours +30 minutes"));
    $code = RandomHelper::quickRandom();
    $capacity = $faker->numberBetween($min = 10, $max = 9000);

    Redis::setEx($code, 5400, $capacity);

    return [
        'code' => $code,
        'capacity' => $capacity,
        'lottery_ends_at' => $datetime,
        'stream_id' => 1,
    ];
});
