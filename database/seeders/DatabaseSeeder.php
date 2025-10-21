<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jibreel Benjamin',
            'username' => 'el',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);
        User::factory(43)->create();
        Category::factory(89)->create();
        Book::factory(7320)->create();
        Borrowing::factory(21705)->create();
    }
}
