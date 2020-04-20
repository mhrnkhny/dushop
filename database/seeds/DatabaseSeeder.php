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
         $this->call(UserTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(\App\Address::class);
        $this->call(\App\Phone::class);
    }
}
