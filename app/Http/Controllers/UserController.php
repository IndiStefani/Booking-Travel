<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index_profile()
    {
        return view('profile.user-profile', [
            'user' => Auth::user(),
        ]);
    }

    public function index()
    {
        $users = User::all();
        return view('pages.user.user-management', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'username' => 'required|string|max:255|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
        ]);

        // Assign role to user
        $user->assignRole('passenger');
        return redirect()->route('user.index')->with('success', 'User created successfully.');
        return redirect()->back()->with('error', 'Failed to create user.');
    }

    public function edit($id)
    {
        $user = User::with(['passenger', 'driver'])->findOrFail($id);

        return view('pages.user.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'password' => 'nullable|string|min:6',
        ]);

        try {
            $user = User::findOrFail($id);

            $user->update([
                'email' => $request->email,
                'name' => $request->name,
            ]);

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
                $user->save();
            }

            if ($user->passenger) {
                $user->passenger()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'phone_number' => $request->phone_number,
                        'address' => $request->address,
                    ]
                );
            } elseif ($user->driver) {
                $user->driver()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'phone_number' => $request->phone_number,
                        'license_number' => $request->license_number,
                    ]
                );
            }

            return redirect()->back()->with('success', 'Profile updated successfully.')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('user.index')->with('error', 'User not found.');
        }
    }
}
