<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    #[ArrayShape(['user_id' => "int", 'message' => "string", 'cost' => "int"])] public function definition(): array
    {
        return [
            'user_id' => random_int(1, 50),
            'message' => Str::random(15),
            'cost'    => random_int(200, 10000),
        ];
    }
}
