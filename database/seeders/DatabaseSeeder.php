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
    public function run(): void
    {

        if (config('database.default') !== 'mysql_trello') {
            $this->call(UserSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(PostSeeder::class);
            $this->call(VersionSeeder::class);
            $this->call(PhoneSeeder::class);
            $this->call(RoleUserSeeder::class);
        } else {
            $this->call(DeskSeeder::class);
            $this->call(DeskListSeeder::class);
            $this->call(CardSeeder::class);
            $this->call(TaskSeeder::class);
        }
    }
}
