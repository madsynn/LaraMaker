<?php

use Illuminate\Database\Seeder;

class ProductPricingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products_prices')->delete();

        \DB::table('products_price')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'product_id' => 1,
                    'price_id' => 1
                ),
            1 =>
                array(
                    'id' => 2,
                    'product_id' => 2,
                    'price_id' => 2
                ),
            2 =>
                array(
                    'id' => 3,
                    'product_id' => 3,
                    'price_id' => 3
                ),
        ));
    }
}
