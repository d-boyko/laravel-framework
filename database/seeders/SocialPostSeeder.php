<?php

namespace Database\Seeders;

use App\Models\SocialPost;
use Illuminate\Database\Seeder;

class SocialPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        SocialPost::factory(100)->create();
    }
}
