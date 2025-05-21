<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flixio - Your Ultimate Movie Destination</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome')  }}">Fli <span>Xio</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('movies') }}">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tvShows') }}">TV Shows</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        @guest
                        <a class="nav-link" href="{{ route('login')}}">Watchlist</a>
                        @else
                        <a class="nav-link" href="{{ route('watchList')}}">Watchlist</a>
                        @endguest
                    </li>
                </ul>
                <form class="search-form d-flex text-light">
                    <i class="fas fa-search"></i>
                    <input class="form-control me-2 text-light" type="search" placeholder="Search movies, TV shows..." aria-label="Search">
                </form>
                <div class="ms-3">
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light"><i class="fas fa-user me-1"></i></a>
                    @else
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light"><i class="fas fa-user me-1"></i></a>
                    @else
                    <a href="{{ route('user.dashboard') }}" class="btn btn-outline-light"><i class="fas fa-user me-1"></i></a>
                    @endif
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">About Flixio</h5>
                    <p>Your ultimate destination for movies and TV shows. Discover, explore, and enjoy unlimited entertainment.</p>
                    <div class="social-links mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="{{ route('welcome') }}"><i class="fas fa-angle-right me-2"></i> Home</a></li>
                        <li><a href="{{ route('movies') }}"><i class="fas fa-angle-right me-2"></i> Movies</a></li>
                        <li><a href="{{ route('tvShows') }}"><i class="fas fa-angle-right me-2"></i> TV Shows</a></li>
                        <li><a href="#"><i class="fas fa-angle-right me-2"></i> My List</a></li>
                        <li><a href="#"><i class="fas fa-angle-right me-2"></i> New & Popular</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">Support</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#"><i class="fas fa-angle-right me-2"></i> FAQ</a></li>
                        <li><a href="#"><i class="fas fa-angle-right me-2"></i> Help Center</a></li>
                        <li><a href="#"><i class="fas fa-angle-right me-2"></i> Terms of Use</a></li>
                        <li><a href="#"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a></li>
                        <li><a href="#"><i class="fas fa-angle-right me-2"></i> Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="footer-title">Contact</h5>
                    <ul class="list-unstyled footer-links">
                        <li><i class="fas fa-map-marker-alt me-2"></i> 1234 Movie St, Hollywood, CA</li>
                        <li><i class="fas fa-phone me-2"></i> (123) 456-7890</li>
                        <li><i class="fas fa-envelope me-2"></i> info@cinestream.com</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Flixio. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>