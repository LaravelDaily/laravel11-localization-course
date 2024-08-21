<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(app()->getLocale()); // <-- Handles redirect with no locale to the current locale
});

Route::prefix('{locale}') // <-- Add the locale segment to the URL
->where(['locale' => '[a-zA-Z]{2}']) // <-- Add a regex to validate the locale
->middleware(SetLocale::class) // <-- Add the middleware
->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // ...
    });

    require __DIR__ . '/auth.php';
});