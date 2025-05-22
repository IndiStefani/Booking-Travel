<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'driver']);
        Role::create(['name' => 'passenger']);

        // Create permissions
        $permissions = [
            'manage users',
            'manage bookings',
            'view bookings',
            'manage passengers',
            'manage drivers',
            'view drivers',
            'manage vehicles',
            'view vehicles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $driverRole = Role::findByName('driver');
        $driverRole->givePermissionTo([
            'manage drivers',
            'view drivers',
            'view bookings',
            'view vehicles',
        ]);

        $passengerRole = Role::findByName('passenger');
        $passengerRole->givePermissionTo([
            'manage bookings',
            'view bookings',
            'view vehicles',
        ]);
    }
}
