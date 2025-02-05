<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthController extends Controller
{
    public function register()
    {
        return view('registration');
    }
 
    public function registerPost(Request $request)
    {
        $user = new User();
 
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
 
        $user->save();
 
        return back()->with('success', 'Sikeres regisztráció! Mostmár bejelentkezhetsz.');
    }
 
    public function login()
    {
        return view('log');
    }
 
    public function loginPost(Request $request)
    {
        $adatok = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($adatok)) {
            return redirect('/')->with('success', 'Sikeres bejelentkezés!');
        }
 
        return back()->with('error', 'Hibás email cím, vagy jelszó!');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}