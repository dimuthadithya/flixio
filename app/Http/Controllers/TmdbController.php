<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

        return view('movies', [
            'popularMovies' => $popularMovies,
            'getImageUrl' => [$this->tmdbService, 'getImageUrl'],
        ]);
    }

    public function search(Request $request)
    {
        $tmdbId = $request->input('tmdb_id');

        $response = Http::get("https://api.themoviedb.org/3/movie/{$tmdbId}", [
            'api_key' => env('TMDB_API_KEY'),
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Movie not found'], 404);
    }

    public function trailer(Request $request)
    {
        $tmdbId = $request->input('tmdb_id');

        $response = Http::get("https://api.themoviedb.org/3/movie/{$tmdbId}/videos", [
            'api_key' => env('TMDB_API_KEY'),
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Trailer not found'], 404);
    }
}
