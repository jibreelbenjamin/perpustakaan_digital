<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowingFactory extends Factory
{
    public function definition(): array
    {
        $borrowDate = $this->faker->dateTimeBetween('-1 month', 'now');
        $returnDate = $this->faker->optional()->dateTimeBetween($borrowDate, '+1 month');

        return [
            'petugas' => User::inRandomOrder()->value('id_user'),
            'id_book' => Book::inRandomOrder()->value('id_book'),
            'borrow_date' => $borrowDate->format('Y-m-d'),
            'return_date' => $returnDate ? $returnDate->format('Y-m-d') : null,
            'status' => $this->faker->randomElement(['dipinjam', 'dikembalikan', 'terlambat', 'hilang']),
        ];
    }
}
