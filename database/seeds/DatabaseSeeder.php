<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(App\User::class, 50)->create()->each(function ($user) {
            Redis::set($user->phone, 1);
        });
        factory(App\Stream::class, 5)->create();
        factory(App\Lottery::class, 50)->create()->each(function ($lottery) {
            Redis::setEx($lottery->code, 5400, $lottery->capacity);
        });

        // DB::table('lottery_user')->insert(
        //     [
        //         'user_id' => App\User::all()->random()->first()->id,
        //         'lottery_id' => App\Lottery::all()->random()->first()->id,
        //     ]
        // );
    }
}
