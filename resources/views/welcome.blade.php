@extends('layouts.app')

@section('content')
<main>
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Unlimited Movies, TV Shows & More</h1>
                <p>Discover the latest and greatest movies and TV shows all in one place. Your ultimate entertainment destination.</p>
                <a href="{{ route('movies') }}" class="btn btn-primary btn-lg"><i class="fas fa-play me-2"></i> Browse Now</a>
            </div>
        </div>
    </section>

    <!-- Box Office Hits Section -->
    <section class="container mb-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h2 class="section-title">Box Office Hits</h2>
        </div>

        <div class="row">
            @foreach ($topIncomeMovies as $movie)
            <x-movie-card :movie="$movie" />
            @endforeach
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('movies') }}" class="btn btn-outline-light">View All Movies <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </section>

    <!-- New Releases Section -->
    <section class="container mb-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h2 class="section-title">New Releases</h2>
        </div>
        <div class="row">
            @foreach ($newReleases as $movie)
            <x-movie-card :movie="$movie" />
            @endforeach
        </div>
    </section>

    <!-- Top Rated Movies Section -->
    <section class="container mb-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h2 class="section-title">Top Rated Movies</h2>
        </div>
        <div class="row">
            @foreach ($topRatedMovies as $movie)
            <x-movie-card :movie="$movie" />
            @endforeach
        </div>
    </section>


    <!-- Feedback Section -->
    <section class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="p-4 text-center rounded feedback-box" style="background-color: var(--primary-color);">
                    <h3 class="mb-3">We Value Your Feedback</h3>
                    <p class="mb-3">Let us know your thoughts, suggestions, or issues. Help us improve your CineStream experience!</p>
                    <div class="row justify-content-center">
                        <div class="col-12">
                           
                            <form class="feedback-form text-start" method="POST" action="{{ route('feedback.store') }}">
                                @csrf
                                <div class="mb-2">
                                    <label for="feedbackEmail" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="feedbackEmail" placeholder="Your Name" value="" readonly>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="feedbackMessage" class="form-label">Message</label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="feedbackMessage" rows="3" placeholder="Your Feedback" required></textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="px-4 btn btn-primary">Submit Feedback</button>
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
        <h2 class="mb-4 text-center section-title">What Our Users Say</h2>
        <div class="row justify-content-center">
            @foreach ($feedbacks as $feedback)
            <div class="mb-4 col-md-4">
                <div class="p-4 text-center rounded testimonial-card h-100">
                    <p class="mb-3 testimonial-text">"{{ $feedback->message }}"</p>
                    <h6 class="mb-0">{{ $feedback->name }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>

<style>
    .feedback-form .form-control::placeholder {
        color: #fff !important;
        opacity: 1;
    }
</style>
@endsection