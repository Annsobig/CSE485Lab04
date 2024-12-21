<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['name' => 'Laravel for Beginners', 'author' => 'John Doe', 'category' => 'Programming', 'year' => 2021, 'quantity' => 10],
            ['name' => 'Mastering PHP', 'author' => 'Jane Smith', 'category' => 'Programming', 'year' => 2020, 'quantity' => 5],
            ['name' => 'Clean Code', 'author' => 'Robert C. Martin', 'category' => 'Software Engineering', 'year' => 2018, 'quantity' => 8],
            ['name' => 'The Pragmatic Programmer', 'author' => 'Andrew Hunt', 'category' => 'Software Engineering', 'year' => 2019, 'quantity' => 6],
            ['name' => 'Design Patterns', 'author' => 'Erich Gamma', 'category' => 'Software Engineering', 'year' => 1994, 'quantity' => 7],
        ];

        // Insert dữ liệu vào bảng
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
