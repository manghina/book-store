<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(BooksTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BookUserSeeder::class);

    }
}
