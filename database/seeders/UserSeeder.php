<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::updateOrCreate([
            'email' => 'admin@perpus.id',
        ], [
            'name'     => 'Admin',
            'password' => bcrypt('password123'),
        ]);
    }
}
