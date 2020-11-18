<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'group_id' => 1,
            'name' => "API",
            'default' => "123456789",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'name' => "Facebook",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'name' => "Pinterest",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'name' => "Twitter",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'name' => "Facebook",
            'default' => "",
        ]);
    }
}