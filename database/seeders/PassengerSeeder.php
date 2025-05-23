<?php

namespace Database\Seeders;

use App\Models\Passenger;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'username' => 'john',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'username' => 'johnny',
        ]);

        $user->assignRole('passenger');

        Passenger::create([
            'user_id' => $user->id,
            'phone_number' => '081234567890',
            'address' => 'Jl. Kebon Jeruk No. 123',
        ]);
    }
}
