<?php

namespace Database\Seeders;

use App\Models\Taggable;
use Illuminate\Database\Seeder;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Taggable::factory(300)->create();
    }
}
