<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Phone::truncate();
        $userId = \App\User::pluck('id')->toArray();
        for ($i = 1; $i < 10; $i++){
            factory(\App\Phone::class)->create(['user_id'=>Arr::random($userId)]);
        }
    }
}
