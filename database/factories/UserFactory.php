<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->safeEmail(),
            'password'          => Str::random(15),
            'agreement'         => fake()->boolean,
            'remember_token'    => Str::uuid(),
            'avatar'            => null,
            'is_active'         => fake()->boolean,
            'is_admin'          => false,
            'age'               => fake()->numberBetween(0, 100),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
    }
}
