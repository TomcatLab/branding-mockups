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
            'validations' => "required"
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
            'name' => "Instgram",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'name' => "Dribbler",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'name' => "Title",
            'default' => "Branding Mockups",
            'validations' => "required"
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'name' => "Keyword",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'name' => "Description",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'name' => "Copyright Text",
            'default' => "Branding Mockups",
        ]);
    }
}