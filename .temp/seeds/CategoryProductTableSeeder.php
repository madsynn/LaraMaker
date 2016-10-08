<?php

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_product')->delete();
        
        \DB::table('category_product')->insert(array (
            0 => 
            array (
                'category_id' => 1,
                'product_id' => 1,
                'created_at' => '2016-09-07 13:19:17',
                'updated_at' => '2016-09-07 13:19:21',
            ),
            1 => 
            array (
                'category_id' => 2,
                'product_id' => 2,
                'created_at' => '2016-09-07 13:19:30',
                'updated_at' => '2016-09-07 13:19:33',
            ),
            2 => 
            array (
                'category_id' => 3,
                'product_id' => 3,
                'created_at' => '2016-09-07 13:19:41',
                'updated_at' => '2016-09-07 13:19:45',
            ),
        ));
        
        
    }
}
