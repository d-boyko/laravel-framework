<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\DeskList;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Card>
 */
class CardFactory extends Factory
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
            'desk_list_id' => fake()->numberBetween(1, DeskList::count()),
        ];
    }
}
