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
//                UserSeeder::class,
//                PostSeeder::class,
                RoleSeeder::class,
                UserPostSeeder::class,
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
                VideoSeeder::class,
                CommentSeeder::class,
                LikeSeeder::class,
                SocialPostSeeder::class,
                TagSeeder::class,
                TaggableSeeder::class,
            ]);
        } elseif (config('database.default') == 'mysql_unit') {
            $this->call([
                UserPostSeeder::class,
                UserPhoneSeeder::class,
//                PhoneSeeder::class,
                RoleSeeder::class,
                VersionSeeder::class,
                RoleUserSeeder::class,
            ]);
        }
    }
}
