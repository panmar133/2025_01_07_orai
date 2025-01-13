<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\PostController;

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

/*Oldalak routolása*/ 
Route::get('/', function () {
    return view('index');
});

Route::get('/salons', [SalonController::class, 'selectSalons'], function () {
    return view('salons');
});
Route::get('/events', [EventsController::class, 'selectEvents'], function () {
    return view('events');
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

/*Lapozo oldal*/ 
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/gallery/navigate', [GalleryController::class, 'navigate'])->name('gallery.navigate');



