@extends('layouts.app')

@section('content')

<section class="container py-5">
    <h1 class="mb-4 text-center text-white display-5 fw-bold watchlist-title"><i class="fas fa-bookmark text-primary me-2"></i>My Watchlist</h1>
    <p class="mb-5 text-center lead text-light">All your saved movies and TV shows in one place. Start watching or manage your list below!</p>
    <div class="row g-4 justify-content-center">
        @foreach ($watchlists as $watchlist )
        @php
        $genre = str_replace(['"', '\\\"'], '', trim($watchlist['genres']));
        $genres = explode(',', $genre);


        @endphp
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="text-white border-0 shadow watchlist-card card bg-dark h-100">
                <div class="position-relative">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500' . $watchlist['poster_path'] }}" class="card-img-top rounded-top" alt="Movie Poster">
                    <span class="top-0 m-2 badge bg-primary position-absolute end-0">Movie</span>
                    <button class="top-0 m-2 btn btn-danger btn-sm position-absolute start-0 rounded-circle" title="Remove"><i class="fas fa-times"></i></button>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="mb-1 card-title">{{ $watchlist['title'] }}</h5>
                    <div class="mb-2 small text-secondary">{{ \Carbon\Carbon::parse($watchlist['release_date'])->format('Y') }} &bull; {{ $watchlist['runtime'] }}min</div>
                    <div class="mb-3">
                        @foreach ($genres as $genre)
                        <span class="badge bg-secondary me-1">{{ $genre }}</span>
                        @endforeach
                    </div>
                    <div class="gap-2 mt-auto d-flex">
                        <a href="./details_movie.html" class="btn btn-primary btn-sm w-100 d-flex justify-content-center align-items-center"><i class="fas fa-play me-1"></i>Watch</a>
                        <a href="./payments.html" class="btn btn-outline-light btn-sm w-100 d-flex justify-content-center align-items-center"><i class="fas fa-shopping-cart me-1"></i>Buy</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-5 text-center">
        <a href="./movies.html" class="px-4 btn btn-outline-primary btn-lg"><i class="fas fa-plus me-2"></i>Add More Movies & Shows</a>
    </div>
</section>

@endsection