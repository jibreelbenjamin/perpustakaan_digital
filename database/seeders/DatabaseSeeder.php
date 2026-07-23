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
        User::factory()->create([
            'name' => 'Moderator Demo',
            'username' => 'moderator',
            'password' => bcrypt('moderator'),
            'role' => 'moderator'
        ]);
        User::factory()->create([
            'name' => 'Staff Demo',
            'username' => 'staff',
            'password' => bcrypt('staff'),
            'role' => 'staff'
        ]);
        User::factory(4099)->create();
        Category::factory(125)->create();
        Book::factory(3692)->create();
        Borrowing::factory(62750)->create();
    }
}
