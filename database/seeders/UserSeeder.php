<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $passenger = User::create([
            'name' => 'Passenger',
            'username' => 'passenger',
            'email' => 'passenger@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $passenger->assignRole('passenger');
    }
}
