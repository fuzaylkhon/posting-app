<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'              => 'Elena Marsh',
                'email'             => 'elena@example.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
            ],
            [
                'name'              => 'Marcus Holt',
                'email'             => 'marcus@example.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
            ],
            [
                'name'              => 'Jackob Page',
                'email'             => 'jackob@example.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
            ],
            [
                'name'              => 'Joe Doe',
                'email'             => 'joe@example.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
            ],
        ];

        User::insert($users);

        $this->command->info('Seeder->Users: 4 users added (password: "password")');
    }
}
