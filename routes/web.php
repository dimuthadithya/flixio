<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TmdbController;
use App\Http\Controllers\TvShowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::put('/user/password', [UserController::class, 'updatePassword'])->name('password.update');
});

Route::get('/about', function () {
    return view("about");
})->name('about');


Route::get('/movies', [TmdbController::class, 'index'])->name('movies');

Route::get('/user', function () {
    return view("user.dashboard");
})->name('user.dashboard');

Route::get('/tvShows', [TvShowController::class, 'index'])->name('tvShows');
Route::get('/watchList', [WatchListController::class, 'index'])->name('watchList');

require __DIR__ . '/auth.php';
