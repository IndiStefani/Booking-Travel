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
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $driver = User::create([
            'name' => 'Driver',
            'email' => 'driver@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $driver->assignRole('driver');

        $passenger = User::create([
            'name' => 'Passenger',
            'email' => 'passenger@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $passenger->assignRole('passenger');
    }
}
