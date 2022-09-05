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

        if (config('database.default') == 'mysql_users') {
            $this->call([
                UserSeeder::class,
                RoleSeeder::class,
                PostSeeder::class,
                VersionSeeder::class,
                PhoneSeeder::class,
                RoleUserSeeder::class,
            ]);
        } elseif (config('database.default') == 'mysql_trello') {
            $this->call([
                DeskSeeder::class,
                DeskListSeeder::class,
                CardSeeder::class,
                TaskSeeder::class,
            ]);
        } elseif (config('database.default') == 'mysql_morph') {
            $this->call([
                CommentSeeder::class,
                VideoSeeder::class,
                LikeSeeder::class,
            ]);
        }
    }
}
