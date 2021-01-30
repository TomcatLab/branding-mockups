<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('pages')->insert([
            'name' => 'Mockups',
            'slug' => 'mockups',
            'home' => 1,
            'parent_id' => 1,
            'group_id' => 1,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Freebies',
            'slug' => 'freebies',
            'parent_id' => 1,
            'group_id' => 1,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Showcase',
            'slug' => 'showcase',
            'parent_id' => 1,
            'group_id' => 1,
            'type_id' => 1
        ]);
    }
}
