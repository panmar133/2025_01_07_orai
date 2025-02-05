<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileImageUpdate(Request $request)
    {
        $request->validate([
            'profileUrlTb' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->image_name = $request->input('profileUrlTb');
        $user->save();

        return redirect()->back()->with('success', 'Profilkép frissítve!');
    }

    public function emailUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->image_name = $request->input('email');
        $user->save();

        return redirect()->back()->with('success', 'Profil email címe frissítve!');
    }


    public function changePassword(Request $request)
    {
            // Validáljuk a form adatokat
            $request->validate([
                'current_password' => 'required|string',
                'password' => 'required|string|min:8|confirmed', // Minimum hossz és megerősítés szükséges
            ]);

            // Ellenőrizzük, hogy a jelenlegi jelszó helyes-e
            if (!Hash::check($request->current_password, Auth::user()->password)) {
                return back()->withErrors(['current_password' => 'A jelenlegi jelszó helytelen.']);
            }

            // Frissítjük a jelszót
            Auth::user()->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'A jelszó sikeresen módosítva!');
    }
}