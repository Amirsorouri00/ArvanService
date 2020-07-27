<?php

use Illuminate\Database\Seeder;

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
        factory(App\User::class, 50)->create();
        factory(App\Stream::class, 50)->create();
        factory(App\Lottery::class, 50)->create();

        DB::table('lottery_user')->insert(
            [
                'user_id' => App\User::all()->random()->first()->id,
                'lottery_id' => App\Lottery::all()->random()->first()->id,
            ]
        );
    }
}
