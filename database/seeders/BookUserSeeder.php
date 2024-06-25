<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookUser;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookUser = [
                [
                    'user_id' => "2",
                    'book_id' => '1'
                ],
                [
                    'user_id' => "2",
                    'book_id' => '2'
                ],
            ];
        foreach ($bookUser as $bookUser) {
            BookUser::create($bookUser);
        }
    }
}
