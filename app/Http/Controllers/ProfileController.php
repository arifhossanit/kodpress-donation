<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        // profile data now stored on users table
        $profile = $user;
        return view('frontend.profile.show', compact('user','profile'));
    }

    public function edit()
    {
        $user = Auth::user();
        $profile = $user;
        return view('frontend.profile.edit', compact('user','profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|max:2048',
        ]);

        // Save profile fields directly on users table
        if ($request->hasFile('avatar')) {
            if ($user->avatar_path) {
                Storage::disk('public')->delete($user->avatar_path);
            }
            $user->avatar_path = $request->file('avatar')->store('avatars', 'public');
        }

        $user->phone = $data['phone'] ?? $user->phone;
        $user->address = $data['address'] ?? $user->address;
        $user->city = $data['city'] ?? $user->city;
        $user->country = $data['country'] ?? $user->country;
        $user->bio = $data['bio'] ?? $user->bio;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
