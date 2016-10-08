<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     */
    public function run()
    {
        DB::table('settings')->truncate();

        $settings = [
            'settings' => '{"site_title":"Grace Manager & CMS - Laravel 5 Multi Language Content Managment System","ga_code":"","meta_keywords":"Laravel 5 Multi Language Content Managment System and company manager custom build","meta_description":"Laravel 5 Multi Language Content Managment System"}',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'lang' => 'en', ];

        DB::table('settings')->insert($settings);
    }
}
