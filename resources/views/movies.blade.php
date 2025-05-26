@extends('layouts.app')

@section('content')

<main class="movies-section">
  <h1 class="movies-title">All Movies</h1>
  <div class="container mb-4 movies-filters">
    <form class="p-2 mb-5 row g-3 align-items-end" method="POST">
      <div class="col-6">
        <label for="genre" class="form-label text-light">Genre</label>
        <select id="genre" class="form-select" name="genre" onchange="filterMoviesByGenre(this.value)">
          <option value="all" selected>All</option>
          <option value="Action">Action</option>
          <option value="Comedy">Comedy</option>
          <option value="Drama">Drama</option>
          <option value="Thriller">Thriller</option>
          <option value="Romance">Romance</option>
          <option value="Horror">Horror</option>
          <option value="Sci-Fi">Sci-Fi</option>
          <option value="Animation">Animation</option>
        </select>
      </div>

      <div class="col-6">
        <label for="release" class="form-label text-light">Release Year</label>
        <select id="release" class="form-select" name="release" onchange="filterMoviesByYear(this.value)">
          <option value="all" selected>All</option>
          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
        </select>
      </div>
    </form>
  </div>
  <div class="mt-4 movies-grid">
    @foreach ($movies as $movie)
    <x-movie-card :movie="$movie" />
    @endforeach
  </div>
</main>

@endsection
