<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
                [
                    'name' => "Dario",
                    'surname' => 'Manghina',
                    'role' => 'admin',
                    'email' => 'manghina.dario@gmail.com',
                    'password' => '$2y$10$wsgC9T7tj74x828zi0vbd.EmYDFU1FpiSn4NglFvIMSD/T0x40.2e',
                    'age' => '18',
                    'sex' => 'M',
                ],
                [
                    'name' => "user1",
                    'surname' => 'test',
                    'role' => 'user',
                    'email' => 'user1@gmail.com',
                    'password' => '$2y$10$wsgC9T7tj74x828zi0vbd.EmYDFU1FpiSn4NglFvIMSD/T0x40.2e',
                    'age' => '17',
                    'sex' => 'F',
                ],
                [
                    'name' => "user2",
                    'surname' => 'test',
                    'role' => 'user',
                    'email' => 'user2@gmail.com',
                    'password' => '$2y$10$wsgC9T7tj74x828zi0vbd.EmYDFU1FpiSn4NglFvIMSD/T0x40.2e',
                    'age' => '19',
                    'sex' => 'F',
                ],
            ];
        foreach ($users as $users) {
            User::create($users);
        }
    }
}
