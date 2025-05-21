@extends('layouts.app')

@section('content')

  <section class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-gallery row g-3 justify-content-center align-items-center">
                    <div class="col-6">
                        <img src="{{ asset('assets/images/about_cover_01.png') }}" alt="About Flixio" class="img-fluid rounded shadow w-100" style="height:420px; object-fit:cover;">
                    </div>
                    <div class="col-6 d-flex flex-column gap-3">
                        <img src="{{ asset('assets/images/about_cover_02.png') }}" alt="Flixio Cinema" class="img-fluid rounded shadow w-100" style="height:350px; object-fit:cover;">
                        <img src="{{ asset('assets/images/about_cover_03.png') }}" alt="Flixio Popcorn" class="img-fluid rounded shadow w-100" style="height:300px; object-fit:cover;">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-4">
                <h1 class="display-5 fw-bold mb-3 about-title">About Flixio</h1>
                <p class="lead">Flixio is your ultimate destination for streaming the latest movies and TV shows. Our mission is to bring the magic of cinema to your fingertips, offering a seamless, user-friendly, and visually stunning platform for all your entertainment needs.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Curated selection of top-rated movies and shows</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Personalized recommendations and watchlists</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Responsive design for all devices</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Secure and easy payment options</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Community-driven feedback and testimonials</li>
                </ul>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="about-highlight-box rounded-3 p-3 text-center shadow">
                            <i class="fas fa-calendar-alt fa-lg mb-2 text-white"></i>
                            <div class="fw-bold">Founded</div>
                            <div>2025</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="about-highlight-box rounded-3 p-3 text-center shadow">
                            <i class="fas fa-globe fa-lg mb-2 text-white"></i>
                            <div class="fw-bold">Countries</div>
                            <div>50+ Worldwide</div>
                        </div>
                    </div>
                </div>
                <p>Flixio is built by movie lovers, for movie lovers. We believe in the power of stories and strive to deliver the best streaming experience possible. Thank you for making us a part of your entertainment journey!</p>
            </div>
        </div>
        <div class="row text-center g-4">
            <div class="col-md-4 mb-4">
                <div class="about-highlight-box p-4 rounded h-100 shadow">
                    <i class="fas fa-film fa-2x mb-3 text-white"></i>
                    <h5 class="fw-bold">10,000+ Titles</h5>
                    <p class="mb-0">A vast and growing library of movies and TV shows from every genre.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="about-highlight-box p-4 rounded h-100 shadow">
                    <i class="fas fa-users fa-2x mb-3 text-white"></i>
                    <h5 class="fw-bold">Global Community</h5>
                    <p class="mb-0">Join millions of users worldwide who trust Flixio for their entertainment.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="about-highlight-box p-4 rounded h-100 shadow">
                    <i class="fas fa-star fa-2x mb-3 text-white"></i>
                    <h5 class="fw-bold">Top Rated Experience</h5>
                    <p class="mb-0">Consistently rated highly for quality, ease of use, and customer support.</p>
                </div>
            </div>
        </div>
        <div class="row mt-5 align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="bg-dark text-white rounded-4 p-4 shadow h-100">
                    <h3 class="text-white mb-3"><i class="fas fa-heart text-danger me-2"></i>Our Values</h3>
                    <ul class="list-unstyled about-values-list">
                        <li><i class="fas fa-bolt text-warning me-2"></i> Fast, reliable streaming with minimal buffering</li>
                        <li><i class="fas fa-shield-alt text-info me-2"></i> Privacy and security for all users</li>
                        <li><i class="fas fa-hand-holding-heart text-success me-2"></i> Customer-first support and engagement</li>
                        <li><i class="fas fa-lightbulb text-primary me-2"></i> Innovation in entertainment technology</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('assets/images/about_cover_all.png') }}" alt="Flixio Community" class="img-fluid rounded shadow">
            </div>
        </div>
    </section>


@endsection