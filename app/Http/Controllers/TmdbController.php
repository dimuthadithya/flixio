<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TmdbService;

class TmdbController extends Controller
{
    protected $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        $popularMovies = $this->tmdbService->getPopularMovies();
        // $nowPlayingMovies = $this->tmdbService->getNowPlayingMovies();
        // $upcomingMovies = $this->tmdbService->getUpcomingMovies();
        // $genres = $this->tmdbService->getGenres();

    }
}
