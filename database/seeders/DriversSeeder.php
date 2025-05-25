<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            // Insert user terlebih dahulu
            $user = User::create([
            'name' => $faker->name,
            'username' => $faker->unique()->userName,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // default password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            ]);

            // Assign role 'driver' ke user (menggunakan Spatie Laravel Permission)
            $user->assignRole('driver');

            // Insert driver dengan user_id dari user yang baru dibuat
            DB::table('drivers')->insert([
            'user_id' => $user->id,
            'phone_number' => $faker->phoneNumber,
            'license_number' => strtoupper(Str::random(10)),
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
