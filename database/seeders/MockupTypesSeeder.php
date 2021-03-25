<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MockupTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mockup_types')->insert([
            'name' => 'Premium',
        ]);

        DB::table('mockup_types')->insert([
            'name' => 'Freebies',
        ]);
    }
}
