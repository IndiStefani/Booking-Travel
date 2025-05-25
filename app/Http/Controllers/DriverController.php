<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\User;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Drivers::all();
        return view('pages.driver.index', compact('drivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'license_number' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt('12345678'), // Default password
        ])
        ->assignRole('driver');

        Drivers::create([
            'user_id' => User::where('name', $request->name)->first()->id,
            'phone_number' => $request->phone_number,
            'license_number' => $request->license_number,
        ]);

        return redirect()->route('driver.index')->with('success', 'Driver created successfully.');
    }

    public function edit($id)
    {
        return view('pages.driver.edit', [
            'driver' => Drivers::findOrFail($id),
            'user' => User::where('id', Drivers::findOrFail($id)->user_id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update a driver
    }

    public function destroy($id)
    {
        $driver = Drivers::findOrFail($id);
        $user = User::findOrFail($driver->user_id);

        $driver->delete();
        $user->delete();

        return redirect()->route('driver.index')->with('success', 'Driver deleted successfully.');
    }
}
