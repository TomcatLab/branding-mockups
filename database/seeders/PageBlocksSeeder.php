<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageBlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('page_blocks')->insert([
            'name' => 'Mockups',
            'key' => 'mockups',
            'filename' => 'mockups',
            'content' => '',
            'style' => '',
            'attributes' => '',
        ]);
        DB::table('page_blocks')->insert([
            'name' => 'Heading',
            'key' => 'pagehead',
            'filename' => 'pagehead',
            'content' => '',
            'style' => '',
            'attributes' => '',
        ]);
        DB::table('page_blocks')->insert([
            'name' => 'Mockup',
            'key' => 'Mockup',
            'filename' => 'mockup',
            'content' => '',
            'style' => '',
            'attributes' => '',
        ]);
        DB::table('page_blocks')->insert([
            'name' => 'Freebies',
            'key' => 'Freebies',
            'filename' => 'freebies',
            'content' => '',
            'style' => '',
            'attributes' => '',
        ]);
        DB::table('page_blocks')->insert([
            'name' => 'Showcase',
            'key' => 'Showcase',
            'filename' => 'showcase',
            'content' => '',
            'style' => '',
            'attributes' => '',
        ]);
    }
}
