@extends('layouts.app')

@section('content')
@php

$watchUrl = $movie['trailer'];

$embedUrl = '';
if (strpos($watchUrl, 'youtube.com/watch?v=') !== false) {
$videoId = substr($watchUrl, strpos($watchUrl, 'v=') + 2);
$embedUrl = 'https://www.youtube.com/embed/' . $videoId;
} elseif (strpos($watchUrl, 'youtu.be/') !== false) {
$videoId = substr($watchUrl, strpos($watchUrl, 'youtu.be/') + 9);
$embedUrl = 'https://www.youtube.com/embed/' . $videoId;
} else {
$embedUrl = $watchUrl; // Fallback to the original URL if no match
}

$genre = str_replace(['"', '\\\"'], '', trim($movie['genres']));
$genres = explode(',', $genre);


@endphp

<main>
    <!-- Movie Cover Section -->
    <section class="mb-5 movie-cover-section position-relative">
        <div class="movie-cover-img-wrapper">
            <img src="https://image.tmdb.org/t/p/w1280{{ $movie['backdrop_path'] }}" alt="Movie Cover" class="img-fluid w-100 movie-cover-img">
            <div class="movie-cover-overlay"></div>
            <div class="container text-white movie-cover-content">
                <div class="row align-items-end">
                    <div class="col-md-4 col-lg-3">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] }}" alt="Movie Poster" class="rounded shadow img-fluid movie-detail-poster">
                    </div>
                    <div class="mt-4 col-md-8 col-lg-9 mt-md-0">
                        <h1 class="mb-2 display-5 fw-bold">{{ $movie['title'] }}</h1>
                        <div class="mb-2">
                            @foreach ($genres as $genre )
                            <span class="badge bg-danger me-2">{{ $genre }}</span>
                            @endforeach
                        </div>
                        <div class="mb-2">
                            <span class="me-3"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</span>
                            <span class="me-3"><i class="fas fa-clock"></i>{{ $movie['runtime'] }}</span>
                            <span class="me-3"><i class="fas fa-star text-warning"></i> {{ $movie['vote_average'] }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="me-3"><i class="fas fa-film"></i> Christopher Nolan</span>
                            <span class="me-3"><i class="fas fa-users"></i> Leonardo DiCaprio, Joseph Gordon-Levitt</span>
                        </div>
                        <div class="flex-wrap gap-3 mb-3 d-flex align-items-center">
                            @php
                            $watchList = [];
                            if (auth()->check() && auth()->user()->watchList) {
                            $watchList = auth()->user()->watchList->pluck('movie_id')->toArray();
                            }
                            $isInWatchList = in_array($movie['id'], $watchList);
                            @endphp
                            @if (auth()->check())
                            @if ($isInWatchList)
                            <button class="px-4 btn btn-secondary btn-lg rounded-pill" type="button"><i class="fas fa-check me-2"></i>Added</button>
                            @else
                            <form action="{{ route('watchList.add', ['movie_id' => $movie['id']]) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="px-4 btn btn-secondary btn-lg rounded-pill" type="submit"><i class="fas fa-plus me-2"></i>Add to Watchlist</button>
                            </form>
                            @endif
                            @else
                            <a href="{{ route('login') }}" class="px-4 btn btn-secondary btn-lg rounded-pill"><i class="fas fa-plus me-2"></i>Add to Watchlist</a>
                            @endif
                            @if(auth()->check())
                            @if($movie['movie_file'] || $movie['download_link'])
                            <a href="{{ route('payment.show', ['movie' => $movie['id']]) }}" class="px-4 btn btn-primary btn-lg rounded-pill">
                                <i class="fas fa-play me-2"></i>Watch Movie
                            </a>
                            @else
                            <button class="px-4 btn btn-primary btn-lg rounded-pill" disabled>
                                <i class="fas fa-play me-2"></i>Coming Soon
                            </button>
                            @endif
                            @else
                            <a href="{{ route('login') }}" class="px-4 btn btn-primary btn-lg rounded-pill">
                                <i class="fas fa-play me-2"></i>Watch Movie
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Movie Trailer Section -->
    <section class="container mb-5">
        <h2 class="mb-4 section-title">Watch Trailer</h2>
        <div class="overflow-hidden rounded shadow ratio ratio-16x9">
            <iframe src="{{ $embedUrl }}" title="Inception Trailer" allowfullscreen></iframe>
        </div>
    </section>

    <!-- Movie Description Section -->
    <section class="container mb-5">
        <h2 class="mb-4 section-title">Description</h2>
        <p class="lead movie-description">{{ $movie['overview'] }}</p>
    </section>

    <!-- Movie Details Section -->
    <section class="container mb-5">
        <h2 class="mb-4 section-title">Movie Details</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 rounded detail-box h-100">
                    <h6 class="text-uppercase text-secondary">Genres</h6>
                    <p>{{ $movie['genres'] }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded detail-box h-100">
                    <h6 class="text-uppercase text-secondary">Release Year</h6>
                    <p>{{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded detail-box h-100">
                    <h6 class="text-uppercase text-secondary">Director</h6>
                    <p>Christopher Nolan</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded detail-box h-100">
                    <h6 class="text-uppercase text-secondary">Cast</h6>
                    <p>Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Tom Hardy</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded detail-box h-100">
                    <h6 class="text-uppercase text-secondary">IMDB Rating</h6>
                    <p>{{ $movie['vote_average'] }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded detail-box h-100">
                    <h6 class="text-uppercase text-secondary">Duration</h6>
                    <p>{{ $movie['runtime'] }}</p>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection