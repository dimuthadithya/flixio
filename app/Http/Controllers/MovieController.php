<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all()->toArray();
        return view('admin.movies', ['movies' => $movies]);
    }


    public function userIndex()
    {


        $movies = Movie::all()->toArray();
        return view('movies', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'tmdb_id' => 'required|integer',
            'title' => 'required|string',
            'original_title' => 'required|string',
            'release_date' => 'required|date',
            'runtime' => 'nullable|integer',
            'overview' => 'required|string',
            'poster_path' => 'nullable|string',
            'backdrop_path' => 'nullable|string',
            'vote_average' => 'nullable|numeric',
            'vote_count' => 'nullable|integer',
            'popularity' => 'nullable|numeric',
            'genres' => 'nullable|string',
            'status' => 'nullable|string',
            'tagline' => 'nullable|string',
            'budget' => 'nullable|integer',
            'revenue' => 'nullable|integer',
            'imdb_id' => 'nullable|string',
            'original_language' => 'nullable|string',
            'adult' => 'nullable|boolean',
            'trailer' => 'nullable|string',
            'movie_file' => 'nullable|file|mimes:mp4,mkv,mov|max:4194304', // 4GB max
            'download_link' => 'nullable|url',
        ]);

        // Handle file upload if present
        $movieFile = null;
        $fileSize = null;

        if ($request->hasFile('movie_file')) {
            $file = $request->file('movie_file');
            if ($file->isValid()) {
                $movieFile = $file->store('movies', 'public'); // Store in public/movies directory
                $fileSize = $file->getSize();
            }
        }

        $idcheck = Movie::where('tmdb_id', $request->tmdb_id)->first();
        if ($idcheck) {
            return redirect()
                ->route('admin.movie_add')
                ->with('status', 'Movie with TMDB ID ' . $request->tmdb_id . ' already exists.');
        }

        $movie = Movie::create([
            'tmdb_id' => $request->tmdb_id,
            'title' => $request->title,
            'original_title' => $request->original_title,
            'release_date' => $request->release_date,
            'runtime' => $request->runtime,
            'overview' => $request->overview,
            'poster_path' => $request->poster_path,
            'backdrop_path' => $request->backdrop_path,
            'vote_average' => $request->vote_average,
            'vote_count' => $request->vote_count,
            'popularity' => $request->popularity,
            'genres' => $request->genres ?? [],
            'status' => $request->status ?? 'active',
            'tagline' => $request->tagline,
            'budget' => $request->budget,
            'revenue' => $request->revenue,
            'imdb_id' => $request->imdb_id,
            'original_language' => $request->original_language,
            'trailer' => $request->trailer,
            'adult' => $request->adult ?? false,
            'movie_file' => $movieFile,
            'download_link' => $request->download_link,
            'file_size' => $fileSize,
        ]);

        return redirect()
            ->route('admin.movies')
            ->with('success', 'Movie "' . $movie->title . '" has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::where('id', $id)->first()->toArray();
        return view('movie_details', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Movie::where('id', $id)->delete();

        return redirect()
            ->route('admin.movies')
            ->with('success', 'Movie has been deleted successfully.');
    }

    public function homepage()
    {
        $newReleases = Movie::where('status', 'active')
            ->orderBy('release_date', 'desc')
            ->take(8)
            ->get();

        $topIncomeMovies = Movie::where('status', 'active')
            ->orderBy('revenue', 'desc')
            ->take(8)
            ->get();

        $topRatedMovies = Movie::where('status', 'active')
            ->orderBy('vote_average', 'desc')
            ->take(8)
            ->get();

        $feedbacks = Feedback::all()->take(6);



        return view('welcome', compact('newReleases', 'topIncomeMovies', 'topRatedMovies', 'feedbacks'));
    }

    /**
     * Display the movie player page.
     */
    public function play($id)
    {
        $movie = Movie::findOrFail($id)->toArray();
        return view('player', ['movie' => $movie]);
    }
}
