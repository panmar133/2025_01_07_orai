<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;



/* Authentication */
Route::get('/registration', [AuthController::class, 'register'])->name('register');
Route::post('/registration', [AuthController::class, 'registerPost'])->name('register');
Route::get('/log', [AuthController::class, 'login'])->name('login');
Route::post('/log', [AuthController::class, 'loginPost'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');


/* Home */
Route::get('/', [HomeController::class, 'index']);

/* Events */
Route::get('/events', [EventController::class, 'showEventsDatas']);
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Like és participate műveletek
Route::post('/event/like', [InteractionController::class, 'likeEvent'])->name('event.like')->middleware('auth');
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
Route::view('/adminEvent', 'adminEvent'); // adminEvent.blade.php
Route::view('/adminSalon', 'adminSalon'); // adminSalon.blade.php

//admin felület
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/make-admin/{id}', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
    Route::post('/admin/remove-admin/{id}', [AdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    Route::post('/admin/create-salon', [AdminController::class, 'createSalon'])->name('admin.createSalon');

    Route::delete('/admin/delete-salon/{salon}', [AdminController::class, 'deleteSalon'])->name('admin.deleteSalon');
    Route::put('/admin/update-salon/{salon}', [AdminController::class, 'updateSalon'])->name('admin.updateSalon');

    Route::post('/admin/create-event', [AdminController::class, 'createEvent'])->name('admin.createEvent');
    Route::put('/admin/update-event/{id}', [AdminController::class, 'updateEvent'])->name('admin.updateEvent');
    Route::delete('/admin/delete-event/{id}', [AdminController::class, 'deleteEvent'])->name('admin.deleteEvent');
});

//szalontulajdonos felület
Route::middleware(['auth', 'owner'])->group(function () {

    Route::get('/owner', [OwnerController::class, 'index'])->name('owner.dashboard');
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); //Esemény létrehozás + mentése
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update'); //Esemény módosítás
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});