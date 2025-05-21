@extends('layouts.app')

@section('content')

    <section class="container py-5">
        <h1 class="display-5 fw-bold mb-4 text-white text-center watchlist-title"><i class="fas fa-bookmark text-primary me-2"></i>My Watchlist</h1>
        <p class="lead text-center text-light mb-5">All your saved movies and TV shows in one place. Start watching or manage your list below!</p>
        <div class="row g-4 justify-content-center">
            <!-- Example Movie Card -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="watchlist-card card bg-dark text-white border-0 shadow h-100">
                    <div class="position-relative">
                        <img src="/api/placeholder/300/450" class="card-img-top rounded-top" alt="Movie Poster">
                        <span class="badge bg-primary position-absolute top-0 end-0 m-2">Movie</span>
                        <button class="btn btn-danger btn-sm position-absolute top-0 start-0 m-2 rounded-circle" title="Remove"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1">Inception</h5>
                        <div class="mb-2 small text-secondary">2010 &bull; 148 min</div>
                        <div class="mb-3">
                            <span class="badge bg-secondary me-1">Action</span>
                            <span class="badge bg-success me-1">Sci-Fi</span>
                        </div>
                        <div class="mt-auto d-flex gap-2">
                            <a href="./details_movie.html" class="btn btn-primary btn-sm w-100 d-flex justify-content-center align-items-center"><i class="fas fa-play me-1"></i>Watch</a>
                            <a href="./payments.html" class="btn btn-outline-light btn-sm w-100 d-flex justify-content-center align-items-center"><i class="fas fa-shopping-cart me-1"></i>Buy</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example TV Show Card -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="watchlist-card card bg-dark text-white border-0 shadow h-100">
                    <div class="position-relative">
                        <img src="/api/placeholder/300/450" class="card-img-top rounded-top" alt="Show Poster">
                        <span class="badge bg-success position-absolute top-0 end-0 m-2">TV Show</span>
                        <button class="btn btn-danger btn-sm position-absolute top-0 start-0 m-2 rounded-circle" title="Remove"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1">Stranger Things</h5>
                        <div class="mb-2 small text-secondary">2016 &bull; 4 Seasons</div>
                        <div class="mb-3">
                            <span class="badge bg-primary me-1">Thriller</span>
                            <span class="badge bg-warning text-dark me-1">Mystery</span>
                        </div>
                        <div class="mt-auto d-flex gap-2">
                            <a href="./details_tvshow.html" class="btn btn-primary btn-sm w-100 d-flex justify-content-center align-items-center"><i class="fas fa-play me-1"></i>Watch</a>
                            <a href="./payments.html" class="btn btn-outline-light btn-sm w-100 d-flex justify-content-center align-items-center"><i class="fas fa-shopping-cart me-1"></i>Buy</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more cards dynamically as needed -->
        </div>
        <div class="text-center mt-5">
            <a href="./movies.html" class="btn btn-outline-primary btn-lg px-4"><i class="fas fa-plus me-2"></i>Add More Movies & Shows</a>
        </div>
    </section>

@endsection