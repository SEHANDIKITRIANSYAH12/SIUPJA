<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.main');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        ]);
        $user->username = $request->username;
        $user->save();
        return back()->with('success', 'Username berhasil diubah.');
    }

    public function password(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi lama salah.']);
        }
        $user->password = bcrypt($request->new_password);
        $user->save();
        return back()->with('success', 'Kata sandi berhasil diubah.');
    }

    public function avatar(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $file = $request->file('avatar');
        $filename = 'avatar_' . $user->id . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/avatars', $filename);
        $user->avatar = 'avatars/' . $filename;
        $user->save();
        return back()->with('success', 'Foto profil berhasil diubah.');
    }
}
