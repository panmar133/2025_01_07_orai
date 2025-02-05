<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
use Illuminate\Support\Facedes\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('registration');
    }
    /*public function registerPost(Request $request)
    {
        $user = new User();

        $user->
    }*/

    public function login()
    {
        return view ('log');
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

        return back()->with('error', 'Hibás e-mail cím, vagy jelszó!');
    }
}