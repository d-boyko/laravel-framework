<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['Reader', 'Commenter', 'Editor', 'Admin'];
        return [
            'user_id' => fake()->numberBetween(1, User::count()),
            'role_name' =>  $roles[fake()->numberBetween(0,3)],
        ];
    }
}
