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
    }
}
