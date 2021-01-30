<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('page_contents')->insert([
            'page_id' => 1,
            'value' => "Mockups content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 2,
            'value' => "Freebies content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 3,
            'value' => "Showcase content",
            'styles' => ""
        ]);
    }
}
