<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('page_components')->insert([
            'name' => 'Mockups',
            'key' => 'MOCKUPS',
            'filename' => 'mockups'
        ]);

        DB::table('page_components')->insert([
            'name' => 'Mockup',
            'key' => 'MOCKUP',
            'filename' => 'mockup'
        ]);

        DB::table('page_components')->insert([
            'name' => 'Freebies',
            'key' => 'FREEBIES',
            'filename' => 'freebies'
        ]);

        DB::table('page_components')->insert([
            'name' => 'Showcase',
            'key' => 'SHOWCASE',
            'filename' => 'showcase'
        ]);
    }
}
