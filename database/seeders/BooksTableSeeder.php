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
                    'name' => "Don't Make Me Think",
                    'author' => 'Steve Krug',
                    'price' => 15.00,
                    'photo' => 'https://placehold.co/200x300',
                ],
                [
                    'name' => 'The Dark Tower',
                    'author' => 'Stephen King',
                    'price' => 9.99,
                    'photo' => 'https://placehold.co/200x300',
                ],
                [
                    'name' => 'The Night Shift',
                    'author' => 'Stephen King',
                    'price' => 19.99,
                    'photo' => 'https://placehold.co/200x300',
                ],
                [
                    'name' => 'The Origin',
                    'author' => 'Dan Brown',
                    'price' => 1.70,
                    'photo' => 'https://placehold.co/200x300',
                ],
                [
                    'name' => 'The Girl in Room 105',
                    'author' => 'Chetan Bhagat',
                    'price' => 1.99,
                    'photo' => 'https://placehold.co/200x300',
                ],
                [
                    'name' => 'Just After Sunset',
                    'author' => 'Stephen King',
                    'price' => 5.00,
                    'photo' => 'https://placehold.co/200x300',
                ],
                [
                    'name' => 'Angels and Demons',
                    'author' => 'Dan Brown',
                    'price' => 3.00,
                    'photo' => 'https://placehold.co/200x300',
                ]
            ];
        foreach ($books as $book) {
           Book::create($book);
        }
    }
}
