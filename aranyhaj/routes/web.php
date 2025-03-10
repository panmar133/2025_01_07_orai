<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

/* Authentication */
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/log', [AuthController::class, 'login'])->name('login');
Route::post('/log', [AuthController::class, 'loginPost'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

/* Home */
Route::get('/', [HomeController::class, 'index']);

/* Events */
Route::get('/events', [EventController::class, 'showEventsDatas']);
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/event/Like', [InteractionController::class, 'likeEvent'])->name('event.like')->middleware('auth');
Route::post('/event/participate', [InteractionController::class, 'participateEvent'])->name('event.participate')->middleware('auth');

/* Salons */
Route::get('/salons', [SalonController::class, 'index'])->name('salons.index');
Route::get('/salons/all', [SalonController::class, 'listAllSalons'])->name('salons.listAll');
Route::get('/salons/data', [SalonController::class, 'showSalonsDatas'])->name('salons.data');

Route::get('/salons/{id}', [SalonController::class, 'show'])->name('salons.show');

/* Interaction (Require Auth) */
Route::middleware('auth')->group(function () {
    Route::post('/like-event', [InteractionController::class, 'likeEvent']);
    Route::post('/participate-event', [InteractionController::class, 'participateEvent']);
});

/* Profile (Require Auth) */
Route::middleware('auth')->group(function () {
    Route::post('/profile/updateUrl', [ProfileController::class, 'profileImageUpdate'])->name('profile.updateUrl');
    Route::post('/profile/updateEmail', [ProfileController::class, 'emailUpdate'])->name('email.change');
    Route::post('/profile/updatePassword', [ProfileController::class, 'changePassword'])->name('password.change');
    Route::post('/profile/updateAddress', [ProfileController::class, 'changeAddress'])->name('address.change');
});

/* Static Pages */
Route::view('/user', 'user'); // user.blade.php
Route::view('/donate', 'donate'); // donate.blade.php
Route::view('/about', 'about'); // about.blade.php
Route::view('/help', 'help'); // help.blade.php

/* Select-Based Redirect */
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

    return redirect($routes[request('select')] ?? '/');
});
