<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::post('/like-event', [InteractionController::class, 'likeEvent'])->middleware('auth');
Route::post('/participate-event', [InteractionController::class, 'participateEvent'])->middleware('auth');


Route::get('/redirect', function () {
    return redirect(request('select'));
});

/*CSS*/ 
Route::get('/css/style.css', function () {
    $path = resource_path('css/style.css');
    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'text/css',
    ]);
});


Route::get('/salons', [SalonController::class, 'index'])->name('salons.index');


/*Oldalak routolása, Eventek routolása*/ 
Route::get('/', function () {
    return view('index');
});
Route::get('/events', [EventController::class, 'listAllEvents'], function () {
    return view('events');
});
    Route::get('/events', [EventController::class, 'showEventsDatas']);

Route::post('/event/Like', [InteractionController::class, 'likeEvent'])->name('event.like');
Route::post('/event/participate', [InteractionController::class, 'participateEvent'])->name('event.participate');


Route::get('/salons', [SalonController::class, 'listAllSalons'], function () {
    return view('salons');
});

//Oldalak routolása
Route::get('/redirect', function () {
    $routes = [
        'log' => '/log',
        'registration' => '/registration',
        'user' => '/user',
        'donate' => '/donate',
        'about' => '/about',
        'events' => '/events',
        'salons' => '/salons'
    ];

    $selected = request('select');

    // Ha van megfelelő választás, átirányítunk
    if (array_key_exists($selected, $routes)) {
        return redirect($routes[$selected]);
    }

    // Ha nincs megfelelő választás, visszatérünk a főoldalra
    return redirect('/');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/log', [AuthController::class, 'login'])->name('login');
Route::post('/log', [AuthController::class, 'loginPost'])->name('login');

Route::get('/', [HomeController::class, 'index']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registration', [AuthController::class, 'register'])->name('registration');

Route::get('/user', function () {
    return view('user'); // user.blade.php
});

Route::post('/profile/updateUrl', [ProfileController::class, 'profileImageUpdate'])->name('profile.updateUrl');
Route::post('/profile/updateEmail', [ProfileController::class, 'emailUpdate'])->name('email.change');
Route::post('/profile/updatePassword', [ProfileController::class, 'changePassword'])->name('password.change');
Route::post('/profile/updateAddress', [ProfileController::class, 'changeAddress'])->name('address.change');

Route::get('/donate', function () {
    return view('donate'); // donate.blade.php
});

Route::get('/about', function () {
    return view('about'); // about.blade.php
});
Route::get('/help', function () {
    return view('help'); // about.blade.php
});