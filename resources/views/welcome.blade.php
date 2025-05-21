@extends('layouts.app')

@section('content')
 <main>
          <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Unlimited Movies, TV Shows & More</h1>
                <p>Discover the latest and greatest movies and TV shows all in one place. Your ultimate entertainment destination.</p>
                <a href="#" class="btn btn-primary btn-lg"><i class="fas fa-play me-2"></i> Browse Now</a>
            </div>
        </div>
    </section>

    <!-- Featured Movies Section -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">Featured Movies</h2>
            <ul class="nav category-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Action</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Comedy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Drama</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <!-- Movie Card 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 8.5
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">Inception</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2020</span>
                            <span><i class="fas fa-clock"></i> 148 min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Card 2 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 9.2
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">The Shawshank Redemption</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 1994</span>
                            <span><i class="fas fa-clock"></i> 142 min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Card 3 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 8.9
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">The Dark Knight</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2008</span>
                            <span><i class="fas fa-clock"></i> 152 min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Card 4 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 8.7
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">Pulp Fiction</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 1994</span>
                            <span><i class="fas fa-clock"></i> 154 min</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-light">View All Movies <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </section>

    <!-- New Releases Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">New Releases</h2>
        <div class="row">
            <!-- Movie Card 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 7.8
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">Dune</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2021</span>
                            <span><i class="fas fa-clock"></i> 155 min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Card 2 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 8.3
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">No Time to Die</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2021</span>
                            <span><i class="fas fa-clock"></i> 163 min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Card 3 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 7.5
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">The Matrix Resurrections</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2021</span>
                            <span><i class="fas fa-clock"></i> 148 min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Card 4 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Movie Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 8.1
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">Spider-Man: No Way Home</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2021</span>
                            <span><i class="fas fa-clock"></i> 148 min</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Rated Shows Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">Top Rated TV Shows</h2>
        <div class="row">
            <!-- Show Card 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Show Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 9.3
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">Breaking Bad</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2008</span>
                            <span><i class="fas fa-film"></i> 5 Seasons</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Show Card 2 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Show Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 9.2
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">Game of Thrones</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2011</span>
                            <span><i class="fas fa-film"></i> 8 Seasons</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Show Card 3 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Show Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 8.9
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">Stranger Things</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2016</span>
                            <span><i class="fas fa-film"></i> 4 Seasons</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Show Card 4 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="/api/placeholder/300/450" class="img-fluid" alt="Show Poster">
                        <div class="movie-rating">
                            <i class="fas fa-star text-warning"></i> 8.8
                        </div>
                    </div>
                    <div class="movie-content">
                        <h5 class="movie-title">The Crown</h5>
                        <div class="movie-info">
                            <span><i class="fas fa-calendar"></i> 2016</span>
                            <span><i class="fas fa-film"></i> 5 Seasons</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-light">View All TV Shows <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </section>

    <!-- Feedback Section -->
    <section class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="feedback-box p-4 text-center rounded" style="background-color: var(--primary-color);">
                    <h3 class="mb-3">We Value Your Feedback</h3>
                    <p class="mb-3">Let us know your thoughts, suggestions, or issues. Help us improve your CineStream experience!</p>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <form class="feedback-form text-start">
                                <div class="mb-2">
                                    <label for="feedbackName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="feedbackName" placeholder="Your Name">
                                </div>
                                <div class="mb-2">
                                    <label for="feedbackEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="feedbackEmail" placeholder="Your Email">
                                </div>
                                <div class="mb-2">
                                    <label for="feedbackMessage" class="form-label">Message</label>
                                    <textarea class="form-control" id="feedbackMessage" rows="3" placeholder="Your Feedback"></textarea>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary px-4">Submit Feedback</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4 text-center">What Our Users Say</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="testimonial-card p-4 h-100 text-center rounded">
                    <p class="testimonial-text mb-3">“CineStream has completely changed my movie nights! The interface is beautiful and the selection is top-notch.”</p>
                    <h6 class="mb-0">Rahul S.</h6>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card p-4 h-100 text-center rounded">
                    <p class="testimonial-text mb-3">“I love the recommendations and the easy-to-use watchlist. Highly recommended for all TV show fans!”</p>
                    <h6 class="mb-0">Priya M.</h6>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card p-4 h-100 text-center rounded">
                    <p class="testimonial-text mb-3">“A must-have for anyone who loves movies. The feedback form is a great touch for user engagement!”</p>
                    <h6 class="mb-0">Amit K.</h6>
                </div>
            </div>
        </div>
    </section>
 </main>
@endsection