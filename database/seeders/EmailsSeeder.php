<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([
            'name' => "Sign up",
            'subject' => "Sign Up Email",
            'content' => "test content"
        ]);
    }
}
