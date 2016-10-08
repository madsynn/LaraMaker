<?php

use Illuminate\Database\Seeder;

class PricingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('prices')->delete();

        \DB::table('prices')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'product_id' => 1,
                    'title' => 'GracieBee',
                    'price' => '399.95',
                    'model' => 'GRACIEBEE',
                    'sku' => '171383',
                    'upc' => '636343171383',
                    'quantity' => '99',
                     'alt_details' => null
                ),
            1 =>
                array (
                    'id' => 2,
                    'product_id' => 2,
                    'title' => 'Z44',
                    'price' => '699.95',
                    'model' => 'Z44HAND',
                    'sku' => '300455',
                    'upc' => '636343300455',
                    'quantity' => '99',
                    'alt_details' => null
                ),
            2 =>
                array (
                    'id' => 3,
                    'product_id' => 3,
                    'title' => 'EZ3',
                    'price' => '399.95',
                    'model' => 'EZ3HAND',
                    'sku' => '346484',
                    'upc' => '636343346484',
                    'quantity' => '99',
                     'alt_details' => null
                ),
        ));


    }
}
