<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (config('database.default') !== 'mysql_test') {
            return;
        }

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PostSeeder::class,
            VersionSeeder::class,
            PhoneSeeder::class,
            RoleUserSeeder::class,
        ]);
    }
}
