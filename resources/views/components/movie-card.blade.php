@php
$genres = $movie['genres'];
$genres = str_replace(',', '', $genres);

$year = $movie['release_date'];
$year = \Carbon\Carbon::parse($year)->format('Y');

@endphp

<div class="col-6 col-md-4 col-lg-3 {{ $genres }} {{ $year }}">
    <div class="movie-card">
        <div class="movie-poster">
            <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="img-fluid" alt="Movie Poster">
            </a>
        </div>
        <div class="mt-4 movie-content d-flex flex-column">
            <h5 class="movie-title">{{ $movie['title'] }}</h5>
            <div class="d-flex justify-content-between align-items-center">
                <div class="movie-rating">
                    <i class="fas fa-star text-warning"></i> {{ $movie['vote_average'] }}
                </div>
                <div class="movie-info">
                    <span><i class="fas fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</span>
                    <span><i class="fas fa-clock"></i> {{ $movie['runtime'] }} min</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .movie-content {
        height: 100px;
        justify-content: space-around;
    }
</style>