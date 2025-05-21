<div class="col-6 col-md-4 col-lg-3">
    <div class="movie-card">
        <div class="movie-poster">
            <img src="{{ $image }}" class="img-fluid" alt="Movie Poster">
            <div class="movie-rating">
                <i class="fas fa-star text-warning"></i> {{ $movie['vote_average'] }}
            </div>
        </div>
        <div class="movie-content">
            <h5 class="movie-title">{{ $movie['title'] }}</h5>
            <div class="movie-info">
                <span><i class="fas fa-calendar"></i> {{ $movie['release_date'] }}</span>
                <span><i class="fas fa-clock"></i> </span>
            </div>
        </div>
    </div>
</div>