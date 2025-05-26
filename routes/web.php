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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/user/password', [UserController::class, 'updatePassword'])->name('password.update');

    Route::get('/user', function () {
        return view("user.dashboard");
    })->name('user.dashboard');

    Route::get('/admin', function () {
        return view("admin.dashboard");
    })->name('admin.dashboard');

    Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies');

    Route::get('/admin/movies/add', function () {
        return view("admin.movie_add");
    })->name('admin.movie_add');

    Route::post('/admin/movies/add', [MovieController::class, 'store'])->name('admin.movie_add.store');



    Route::get('/admin/users', function () {
        return view("admin.users");
    })->name('admin.users');
});

Route::get('/about', function () {
    return view("about");
})->name('about');


Route::get('/movies', [MovieController::class, 'userIndex'])->name('movies');
Route::post('/api/fetch-movie', [TmdbController::class, 'search'])->name('movies.search');
Route::post('/api/fetch-movie/trailer', [TmdbController::class, 'trailer'])->name('movies.trailer');


Route::get('/tvShows', [TvShowController::class, 'index'])->name('tvShows');
Route::get('/watchList', [WatchListController::class, 'index'])->name('watchList');

require __DIR__ . '/auth.php';
