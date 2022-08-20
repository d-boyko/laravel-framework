<?php

namespace Database\Seeders;

use App\Models\Version;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Version::factory()->createMany([
            ['title' => '8.61', 'release_date' => '2021-09-14'],
            ['title' => '8.60', 'release_date' => '2021-09-14'],
            ['title' => '8.59', 'release_date' => '2021-09-07'],
            ['title' => '8.58', 'release_date' => '2021-09-01'],
            ['title' => '8.57', 'release_date' => '2021-08-30'],
            ['title' => '8.56', 'release_date' => '2021-08-25'],
        ]);
    }
}
