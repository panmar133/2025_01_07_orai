<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\InteractionController;

Route::post('/like-event', [InteractionController::class, 'likeEvent'])->middleware('auth');
Route::post('/participate-event', [InteractionController::class, 'participateEvent'])->middleware('auth');

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


/*Oldalak routolása*/ 
Route::get('/', function () {
    return view('index');
});
Route::get('/events', [EventController::class, 'listAllEvents'], function () {
    return view('events');
});
Route::get('/salons', [SalonController::class, 'listAllSalons'], function () {
    return view('salons');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/donate', function () {
    return view('donate');
});
Route::get('/log', function () {
    return view('log');
});
Route::get('/registration', function () {
    return view('registration');
});