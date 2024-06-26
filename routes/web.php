<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::delete('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');

    Route::resource('users', UsersController::class)->middleware(['auth', 'verified'])
        ->only('index', 'store', 'update', 'destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware(['verified']);

    Route::get('/users', function () {
        return view('users');
    })->name('users')->middleware(['verified']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('purchases', \App\Http\Controllers\PurchaseController::class);

require __DIR__.'/auth.php';
