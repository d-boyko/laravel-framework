<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = ['Release', 'Import', 'Export', 'In-Progress'];
        return [
            'name' =>  $tags[fake()->numberBetween(0,3)],
        ];
    }
}
