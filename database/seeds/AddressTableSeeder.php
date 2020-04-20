<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Address::truncate();
        $userId = \App\User::pluck('id')->toArray();
        for ($i = 1 ;$i<10;$i++){
            factory(\App\Address::class)->create([
                'user_id'=>Arr::random($userId)
            ]);
        }

    }
}
