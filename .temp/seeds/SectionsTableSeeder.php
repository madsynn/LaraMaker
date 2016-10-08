<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SectionsTableSeeder extends Seeder {

    public function run() {
//        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
//        \DB::table('sections')->truncate();
//        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        \DB::table('sections')->insert([
            [
                'name' => 'The Grace Company Section',
                'slug' => Str::slug('the-grace-company-section'),
                'lang' => 'en'],
            [
                'name' => 'Hand Quilting Section',
                'slug' => Str::slug('hand-quilting-section'),
                'lang' => 'en'],
            [
                'name' => 'Machine Quilting  Section',
                'slug' => Str::slug('machine-quilting-section'),
                'lang' => 'en'],
            [
                'name' => 'Quilting Hoop Section',
                'slug' => Str::slug('quilting-hoop-section'),
                'lang' => 'en'],
            [
                'name' => 'Lap Hoops Section',
                'slug' => Str::slug('lap-hoops-section'),
                'lang' => 'en'],
            [
                'name' => 'Hand Quilting Frames Section',
                'slug' => Str::slug('hand-quilting-frames-section'),
                'lang' => 'en'],
            [
                'name' => 'Machine Quilting Frames Section',
                'slug' => Str::slug('machine-quilting-frames-section'),
                'lang' => 'en'],
            [
                'name' => 'Qnique Section',
                'slug' => Str::slug('qnique-section'),
                'lang' => 'en'],
            [
                'name' => 'Quilting Accessories Section',
                'slug' => Str::slug('quilting-accessories-section'),
                'lang' => 'en'],
            [
                'name' => 'Machine Frame Accessories Section',
                'slug' => Str::slug('machine-frame-accessories-section'),
                'lang' => 'en'],
            [
                'name' => 'Hand Frame Accessories Section',
                'slug' => Str::slug('hand-frame-accessories-section'),
                'lang' => 'en'],
            [
                'name' => 'Hoop Accessories Section',
                'slug' => Str::slug('hoop-accessories-section'),
                'lang' => 'en']
        ]);
    }

}
