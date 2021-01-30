<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminTableSeeder::class);
        $this->call(ConfigurationGroupsSeeder::class);
        $this->call(ConfigurationsSeeder::class);
        $this->call(EmailsSeeder::class);
        $this->call(PageBlocksSeeder::class);
        $this->call(PageGroupsSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(PageContentsSeeder::class);
        $this->call(PageTypesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PageComponentsSeeder::class);
    }
}
