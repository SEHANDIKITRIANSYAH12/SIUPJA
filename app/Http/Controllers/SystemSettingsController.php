<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SystemSettingsController extends Controller
{
    public function index()
    {
        return view('backend.system.settings');
    }

    public function update(Request $request)
    {
        // Simulasi update, misal: menyimpan ke .env atau config
        // Di sini hanya flash message saja
        session()->flash('success', 'Pengaturan berhasil disimpan!');
        return redirect()->route('system.settings');
    }

    public function password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);
        $user = auth()->user();
        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi lama salah.']);
        }
        $user->password = bcrypt($request->new_password);
        $user->save();
        return back()->with('success', 'Kata sandi berhasil diubah.');
    }

    public function avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = auth()->user();
        $file = $request->file('avatar');
        $filename = 'avatar_' . $user->id . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/avatars', $filename);
        $user->avatar = 'avatars/' . $filename;
        $user->save();
        return back()->with('success', 'Foto profil berhasil diubah.');
    }
}
