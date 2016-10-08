<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run()
    {

        DB::table('faqs')->truncate();

        DB::table('faqs')->insert([
            [
                'question'   => 'Does Grace Company make the Qnique Quilter?',
                'answer'     => 'Yes',
                'order'      => 1,
                'lang'       => 'en',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]

        ]);
    }
}
