<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'year' => $this->faker->year(),
            'id_category' => Category::inRandomOrder()->value('id_category'),
            'stock' => $this->faker->numberBetween(1, 50),
        ];
    }
}
