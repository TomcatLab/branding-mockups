<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('page_groups')->insert([
            'name' => 'Main Menu',
            'key' => 'main-menu'
        ]);
        DB::table('page_groups')->insert([
            'name' => 'Products',
            'key' => 'products'
        ]);
        DB::table('page_groups')->insert([
            'name' => 'Support',
            'key' => 'support'
        ]);
        DB::table('page_groups')->insert([
            'name' => 'Further Information',
            'key' => 'further-information'
        ]);
    }
}
