<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Video;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        $relatedModels = [
            'App\Models\SocialPost',
            'App\Models\Video',
        ];
        $randomKeys = array_rand($relatedModels);

        return [
            'text' => Str::random(10),
            'commentable_id' => random_int(1, Video::count()),
            'commentable_type' => $relatedModels[$randomKeys],
        ];
    }
}
