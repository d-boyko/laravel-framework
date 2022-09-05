<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Like;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        $likeableTypes = [
            'video',
            'comment',
        ];
        $randomKeys = array_rand($likeableTypes);

        return [
            'is_liked' => fake()->boolean(80),
            'likeable_id' => random_int(1, Comment::count()),
            'likeable_type' => $likeableTypes[$randomKeys],
        ];
    }
}
