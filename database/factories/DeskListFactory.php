<?php

namespace Database\Factories;

use App\Models\Desk;
use App\Models\DeskList;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<DeskList>
 */
class DeskListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(6),
            'desk_id' => fake()->numberBetween(1, Desk::count()),
        ];
    }
}
