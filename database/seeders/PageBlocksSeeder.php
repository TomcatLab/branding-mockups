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
    }
}
