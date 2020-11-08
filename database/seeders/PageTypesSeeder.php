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
        ]);
        DB::table('page_types')->insert([
            'name' => 'Link',
            'action' => 'url',
        ]);
    }
}
