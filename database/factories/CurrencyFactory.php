<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'id' => strtoupper(Str::random(3)),
            'name' => strtolower(Str::random(5)),
            'price' => fake()->numberBetween(0, 100),
            'is_active' => fake()->boolean(80),
            'active_at' => fake()->time,
            'sort' => fake()->numberBetween(1, 3),
        ];
    }
}
