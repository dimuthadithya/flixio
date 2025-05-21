@extends('layouts.app')

@section('content')

<main>
    <!-- Movie Cover Section -->
    <section class="movie-cover-section position-relative mb-5">
        <div class="movie-cover-img-wrapper">
            <img src="/api/placeholder/900/400" alt="Movie Cover" class="img-fluid w-100 movie-cover-img">
            <div class="movie-cover-overlay"></div>
            <div class="container movie-cover-content text-white">
                <div class="row align-items-end">
                    <div class="col-md-4 col-lg-3">
                        <img src="/api/placeholder/300/450" alt="Movie Poster" class="img-fluid rounded shadow movie-detail-poster">
                    </div>
                    <div class="col-md-8 col-lg-9 mt-4 mt-md-0">
                        <h1 class="display-5 fw-bold mb-2">Inception</h1>
                        <div class="mb-2">
                            <span class="badge bg-primary me-2">Action</span>
                            <span class="badge bg-secondary me-2">Sci-Fi</span>
                            <span class="badge bg-success me-2">Thriller</span>
                        </div>
                        <div class="mb-2">
                            <span class="me-3"><i class="fas fa-calendar"></i> 2010</span>
                            <span class="me-3"><i class="fas fa-clock"></i> 148 min</span>
                            <span class="me-3"><i class="fas fa-star text-warning"></i> 8.8</span>
                        </div>
                        <div class="mb-3">
                            <span class="me-3"><i class="fas fa-film"></i> Christopher Nolan</span>
                            <span class="me-3"><i class="fas fa-users"></i> Leonardo DiCaprio, Joseph Gordon-Levitt</span>
                        </div>
                        <div class="mb-3 d-flex flex-wrap gap-3 align-items-center">
                            <button class="btn btn-secondary btn-lg rounded-pill px-4"><i class="fas fa-plus me-2"></i>Add to Watchlist</button>
                            <a href="#" class="btn btn-primary btn-lg rounded-pill px-4"><i class="fas fa-play me-2"></i>Watch Movie</a>
                            <a href="#" class="btn btn-success btn-lg rounded-pill px-4"><i class="fas fa-download me-2"></i>Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Movie Trailer Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Watch Trailer</h2>
        <div class="ratio ratio-16x9 rounded shadow overflow-hidden">
            <iframe src="https://www.youtube.com/embed/YoHD9XEInc0" title="Inception Trailer" allowfullscreen></iframe>
        </div>
    </section>

    <!-- Movie Description Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Description</h2>
        <p class="lead movie-description">A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO. But his tragic past may doom the project and his team to disaster.</p>
    </section>

    <!-- Movie Details Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Movie Details</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Genres</h6>
                    <p>Action, Sci-Fi, Thriller</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Release Year</h6>
                    <p>2010</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Director</h6>
                    <p>Christopher Nolan</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Cast</h6>
                    <p>Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, Tom Hardy</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">IMDB Rating</h6>
                    <p>8.8</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Duration</h6>
                    <p>148 min</p>
                </div>
            </div>
        </div>
    </section>

    </main>

@endsection