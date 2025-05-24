<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
        try {
            $tmdbId = $request->input('tmdb_id');

            $response = Http::get("https://api.themoviedb.org/3/movie/{$tmdbId}", [
                'api_key' => env('TMDB_API_KEY'),
                'append_to_response' => 'credits,videos'
            ]);

            if (!$response->successful()) {
                Log::error('TMDB API Error', [
                    'status' => $response->status(),
                    'response' => $response->json()
                ]);
                return response()->json(['error' => 'Movie not found'], 404);
            }

            $movieData = $response->json();

            // Format the data for our database structure
            $formattedData = [
                'tmdb_id' => $movieData['id'],
                'title' => $movieData['title'],
                'original_title' => $movieData['original_title'],
                'release_date' => $movieData['release_date'],
                'runtime' => $movieData['runtime'],
                'overview' => $movieData['overview'],
                'poster_path' => $movieData['poster_path'],
                'backdrop_path' => $movieData['backdrop_path'],
                'vote_average' => $movieData['vote_average'],
                'vote_count' => $movieData['vote_count'],
                'popularity' => $movieData['popularity'],
                'genres' => $movieData['genres'],
                'status' => 'active',
                'tagline' => $movieData['tagline'],
                'budget' => $movieData['budget'],
                'revenue' => $movieData['revenue'],
                'imdb_id' => $movieData['imdb_id'],
                'original_language' => $movieData['original_language'],
                'video' => $movieData['video'],
                'adult' => $movieData['adult']
            ];

            return response()->json($formattedData);
        } catch (\Exception $e) {
            Log::error('Error fetching movie data: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch movie data'], 500);
        }
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


    public function genres(Request $request)
    {
        $response = Http::get("https://api.themoviedb.org/3/genre/movie/list", [
            'api_key' => env('TMDB_API_KEY'),
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Genres not found'], 404);
    }
}
