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
            'data' => 'mockups',
            'home' => 1,
            'parent_id' => null,
            'group_id' => 1,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Freebies',
            'slug' => 'freebies',
            'data' => 'freebies',
            'parent_id' => null,
            'group_id' => 1,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Showcase',
            'slug' => 'showcase',
            'data' => 'showcase',
            'parent_id' => null,
            'group_id' => 1,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Mockup',
            'slug' => 'mockup',
            'data' => 'mockup,presentation,structure',
            'parent_id' => 1,
            'group_id' => 1,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Freebie',
            'slug' => 'freebie',
            'data' => 'freebies',
            'parent_id' => 2,
            'group_id' => 1,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Packaging',
            'slug' => 'packaging',
            'data' => '',
            'parent_id' => null,
            'group_id' => 2,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Stationery',
            'slug' => 'stationery',
            'data' => '',
            'parent_id' => null,
            'group_id' => 2,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Become a Seller',
            'slug' => 'become-a-seller',
            'data' => '',
            'parent_id' => null,
            'group_id' => 3,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Contact Us',
            'slug' => 'contact-us',
            'data' => '',
            'parent_id' => null,
            'group_id' => 3,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'data' => '',
            'parent_id' => null,
            'group_id' => 4,
            'type_id' => 1
        ]);
        DB::table('pages')->insert([
            'name' => 'Terms of Service',
            'slug' => 'terms-of-service',
            'data' => '',
            'parent_id' => null,
            'group_id' => 4,
            'type_id' => 1
        ]);
    }
}
