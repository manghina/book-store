<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
                [
                    'title' => "Don't Make Me Think",
                    'author' => 'Steve Krug',
                    'price' => 1500,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
                [
                    'title' => 'The Dark Tower',
                    'author' => 'Stephen King',
                    'price' => 999,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
                [
                    'title' => 'The Night Shift',
                    'author' => 'Stephen King',
                    'price' => 1999,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
                [
                    'title' => 'The Origin',
                    'author' => 'Dan Brown',
                    'price' => 170,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
                [
                    'title' => 'The Girl in Room 105',
                    'author' => 'Chetan Bhagat',
                    'price' => 199,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
                [
                    'title' => 'Just After Sunset',
                    'author' => 'Stephen King',
                    'price' => 500,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
                [
                    'title' => 'Angels and Demons',
                    'author' => 'Dan Brown',
                    'price' => 300,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
                [
                    'title' => 'Angels and Demons',
                    'author' => 'Dan Brown',
                    'price' => 300,
                    'original_price' => 2000,
                    'image' => 'https://placehold.co/334x200',
                ],
            ];
        foreach ($books as $book) {
           Book::create($book);
        }
    }
}
