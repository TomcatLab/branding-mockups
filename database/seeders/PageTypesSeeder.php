<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('page_types')->insert([
            'name' => 'Page',
            'action' => 'content',
            'show' => "keywords,description",
            'hide' => 'link'
        ]);
        DB::table('page_types')->insert([
            'name' => 'Link',
            'action' => 'url',
            'show' => 'link',
            'hide' => "keywords,description"
        ]);
        DB::table('page_types')->insert([
            'name' => 'Inner Page',
            'action' => 'innerpage',
            'show' => 'keywords,description',
            'hide' => "link"
        ]);
    }
}
