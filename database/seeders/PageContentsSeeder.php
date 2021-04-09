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
        DB::table('page_contents')->insert([
            'page_id' => 4,
            'value' => "Mockup content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 5,
            'value' => "Freebie content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 6,
            'value' => "Packaging content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 7,
            'value' => "Stationery content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 8,
            'value' => "Become a Seller content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 9,
            'value' => "Contact Us content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 10,
            'value' => "Privacy Policy content",
            'styles' => ""
        ]);
        DB::table('page_contents')->insert([
            'page_id' => 11,
            'value' => "Terms of Service content",
            'styles' => ""
        ]);
    }
}
