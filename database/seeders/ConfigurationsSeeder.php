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
            'key' => 'BEHANCE_API',
            'default' => "123456789",
            'validations' => "required"
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'key' => 'FACEBOOK_LINK',
            'name' => "Facebook",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'key' => 'PINTEREST_LINK',
            'name' => "Pinterest",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'key' => 'TWITTER_LINK',
            'name' => "Twitter",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'key' => 'INSTAGRAM_LINK',
            'name' => "Instgram",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 2,
            'key' => 'DRIBBLER_LINK',
            'name' => "Dribbler",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'key' => 'CURRENCY',
            'name' => "Currency",
            'default' => "$",
            'validations' => "required"
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'name' => "Title",
            'key' => 'TITLE',
            'default' => "Branding Mockups",
            'validations' => "required"
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'key' => 'KEYWORD',
            'name' => "Keyword",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'key' => 'DESCRIPTION',
            'name' => "Description",
            'default' => "",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 3,
            'key' => 'COPYRIGHT_TEXT',
            'name' => "Copyright Text",
            'default' => "Branding Mockups",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 4,
            'key' => 'TAX',
            'name' => "Tax",
            'default' => "2",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 4,
            'key' => 'DISCOUNT',
            'name' => "Discount",
            'default' => "2",
        ]);

        DB::table('configurations')->insert([
            'group_id' => 4,
            'key' => 'EXTRA_CHARGE',
            'name' => "Extra Charge",
            'default' => "2",
        ]);
    }
}