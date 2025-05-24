<?php

namespace App\Http\Controllers;

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
        ]);

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
            'adult' => $request->adult ?? false,
            'trailer' => $request->trailer
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
        //
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
        //
    }
}
