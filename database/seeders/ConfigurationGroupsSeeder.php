<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuration_groups')->insert([
            'name' => 'Behance',
        ]);

        DB::table('configuration_groups')->insert([
            'name' => 'Social Media',
        ]);

        DB::table('configuration_groups')->insert([
            'name' => 'Global Settings',
        ]);

        DB::table('configuration_groups')->insert([
            'name' => 'Billing Information',
        ]);
    }
}