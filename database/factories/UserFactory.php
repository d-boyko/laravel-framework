<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->safeEmail(),
            'password'          => Str::random(15),
            'remember_token'    => Str::uuid(),
            'is_active'         => fake()->boolean,
            'is_admin'          => fake()->boolean(5),
        ];
    }
}
