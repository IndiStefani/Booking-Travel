<?php

namespace Database\Seeders;

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
            DB::table('drivers')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'license_number' => strtoupper(Str::random(10)),
                'photo' => 'driver_' . $i . '.jpg', // contoh nama file foto
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
