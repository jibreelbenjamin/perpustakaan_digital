<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $roles = ['moderator', 'staff'];

        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'password' => bcrypt('password'),
            'role' => $this->faker->randomElement($roles),
        ];
    }
}
