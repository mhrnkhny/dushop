<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Color::truncate();

        $productId = \App\Product::pluck('id')->toArray();
        if (!empty($productId)) {
            for ($i = 1; $i < 10; $i++) {
                factory(App\Color::class)->create([
                    'product_id' => Arr::random($productId)
                ]);
            }
        }

    }
}
