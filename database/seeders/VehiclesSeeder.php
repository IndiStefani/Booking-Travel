<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $types = ['Minibus', 'SUV', 'MPV', 'Van', 'Sedan'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('vehicles')->insert([
                'name' => 'Vehicle ' . ($i + 1),
                'plate_number' => strtoupper($faker->bothify('B #### ??')),
                'type' => $faker->randomElement($types),
                'capacity' => $faker->numberBetween(5, 15),
                'photo' => 'vehicle_' . $i . '.jpg', // nama file foto dummy
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
