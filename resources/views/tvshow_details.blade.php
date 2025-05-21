@extends('layouts.app')

@section('content')

<main>
    <!-- TV Show Cover Section -->
    <section class="movie-cover-section position-relative mb-5">
        <div class="movie-cover-img-wrapper">
            <img src="/api/placeholder/900/400" alt="TV Show Cover" class="img-fluid w-100 movie-cover-img">
            <div class="movie-cover-overlay"></div>
            <div class="container movie-cover-content text-white">
                <div class="row align-items-end">
                    <div class="col-md-4 col-lg-3">
                        <img src="/api/placeholder/300/450" alt="TV Show Poster" class="img-fluid rounded shadow movie-detail-poster">
                    </div>
                    <div class="col-md-8 col-lg-9 mt-4 mt-md-0">
                        <h1 class="display-5 fw-bold mb-2">Stranger Things</h1>
                        <div class="mb-2">
                            <span class="badge bg-primary me-2">Drama</span>
                            <span class="badge bg-secondary me-2">Fantasy</span>
                            <span class="badge bg-success me-2">Horror</span>
                        </div>
                        <div class="mb-2">
                            <span class="me-3"><i class="fas fa-calendar"></i> 2016</span>
                            <span class="me-3"><i class="fas fa-film"></i> 4 Seasons</span>
                            <span class="me-3"><i class="fas fa-star text-warning"></i> 8.7</span>
                        </div>
                        <div class="mb-3">
                            <span class="me-3"><i class="fas fa-users"></i> Winona Ryder, David Harbour, Millie Bobby Brown</span>
                        </div>
                        <div class="mb-3 d-flex flex-wrap gap-3 align-items-center">
                            <button class="btn btn-secondary btn-lg rounded-pill px-4"><i class="fas fa-plus me-2"></i>Add to Watchlist</button>
                            <a href="#" class="btn btn-primary btn-lg rounded-pill px-4"><i class="fas fa-play me-2"></i>Watch Show</a>
                            <a href="#" class="btn btn-success btn-lg rounded-pill px-4"><i class="fas fa-download me-2"></i>Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TV Show Trailer Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Watch Trailer</h2>
        <div class="ratio ratio-16x9 rounded shadow overflow-hidden">
            <iframe src="https://www.youtube.com/embed/b9EkMc79ZSU" title="Stranger Things Trailer" allowfullscreen></iframe>
        </div>
    </section>

    <!-- TV Show Description Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Description</h2>
        <p class="lead movie-description">When a young boy vanishes, a small town uncovers a mystery involving secret experiments, terrifying supernatural forces, and one strange little girl.</p>
    </section>

    <!-- TV Show Seasons Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Seasons</h2>
        <div class="row g-4">
            <div class="col-12">
                <div class="detail-box p-4 rounded h-100 text-center">
                    <h6 class="text-uppercase text-secondary">Total Seasons</h6>
                    <p class="fs-4 fw-bold mb-0">4</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TV Show Details Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Show Details</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Genres</h6>
                    <p>Drama, Fantasy, Horror</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">First Air Year</h6>
                    <p>2016</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Seasons</h6>
                    <p>4</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Episodes</h6>
                    <p>34</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">Cast</h6>
                    <p>Winona Ryder, David Harbour, Millie Bobby Brown, Finn Wolfhard</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box p-4 rounded h-100">
                    <h6 class="text-uppercase text-secondary">IMDB Rating</h6>
                    <p>8.7</p>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection