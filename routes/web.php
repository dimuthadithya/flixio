<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TmdbController;
use App\Http\Controllers\TvShowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchListController;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'homepage'])->name('welcome');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movie.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/user/password', [UserController::class, 'updatePassword'])->name('password.update');

    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

    Route::get('/admin', function () {
        $moviesCount = Movie::count();
        $userCount = User::count();
        $recentlyAddedMovies = Movie::orderBy('created_at', 'desc')->take(5)->get()->toArray();
        $recentlyAddedUsers = User::orderBy('created_at', 'desc')->take(5)->get()->toArray();

        return view("admin.dashboard", [
            'moviesCount' => $moviesCount,
            'userCount' => $userCount,
            'recentlyAddedMovies' => $recentlyAddedMovies,
            'recentlyAddedUsers' => $recentlyAddedUsers
        ]);
    })->name('admin.dashboard');

    Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies');

    Route::get('/admin/movies/add', function () {
        return view("admin.movie_add");
    })->name('admin.movie_add');

    Route::post('/admin/movies/add', [MovieController::class, 'store'])->name('admin.movie_add.store');



    Route::get('/admin/users', function () {
        $users = User::orderBy('created_at', 'desc')->get()->toArray();
        return view("admin.users", ['users' => $users]);
    })->name('admin.users');
});

Route::get('/about', function () {
    return view("about");
})->name('about');

Route::delete('/admin/movies/{id}', [MovieController::class, 'destroy'])->name('admin.movie.delete');


Route::get('/movies', [MovieController::class, 'userIndex'])->name('movies');
Route::post('/api/fetch-movie', [TmdbController::class, 'search'])->name('movies.search');
Route::post('/api/fetch-movie/trailer', [TmdbController::class, 'trailer'])->name('movies.trailer');


Route::get('/watchList', [WatchListController::class, 'index'])->name('watchList');
Route::post('/watchList/add', [WatchListController::class, 'store'])->name('watchList.add');
Route::get('/watchList/remove/{id}', [WatchListController::class, 'destroy'])->name('watchList.remove');


require __DIR__ . '/auth.php';
