<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Taggable>
 */
class TaggableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $relatedModels = ['video', 'social_post'];
        $randomKeys = array_rand($relatedModels);

        return [
            'tag_id' => fake()->numberBetween(1, Tag::count()),
            'taggable_id' => fake()->numberBetween(1, Video::count()),
            'taggable_type' =>  $relatedModels[$randomKeys],
        ];
    }
}
