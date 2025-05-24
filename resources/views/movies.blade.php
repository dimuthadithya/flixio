@extends('layouts.app')

@section('content')

<main class="movies-section">
  <h1 class="movies-title">All Movies</h1>
  <div class="container mb-4 movies-filters">
    <form class="p-2 mb-5 row g-3 align-items-end">
      <div class="col-md-4">
        <label for="genre" class="form-label text-light">Genre</label>
        <select id="genre" class="form-select">
          <option selected>All</option>
          <option>Action</option>
          <option>Comedy</option>
          <option>Drama</option>
          <option>Thriller</option>
          <option>Romance</option>
          <option>Horror</option>
          <option>Sci-Fi</option>
          <option>Animation</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="release" class="form-label text-light">Release Date</label>
        <select id="release" class="form-select">
          <option selected>All</option>
          <option>2025</option>
          <option>2024</option>
          <option>2023</option>
          <option>2022</option>
          <option>2021</option>
          <option>2020</option>
          <option>2010-2019</option>
          <option>2000-2009</option>
          <option>1990-1999</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="popularity" class="form-label text-light">Sort By</label>
        <select id="popularity" class="form-select">
          <option selected>Popularity</option>
          <option>Rating</option>
          <option>Newest</option>
          <option>Oldest</option>
        </select>
      </div>
    </form>
  </div>
  <div class="mt-4 movies-grid">


    @foreach ($popularMovies['results'] as $popularMovie )
    <x-movie-card :movie="$popularMovie" :image="$getImageUrl($popularMovie['poster_path'])" />
    @endforeach
  </div>
</main>

@endsection