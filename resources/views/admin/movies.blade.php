@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Movie from TMDB</h4>
                </div>
                <div class="card-body">
                    <!-- TMDB Search Form -->
                    <div class="mb-4">
                        <div class="input-group">
                            <input type="text" id="movieSearch" class="form-control" placeholder="Search movie by title...">
                            <button class="btn btn-primary" id="searchButton">Search TMDB</button>
                        </div>
                    </div>

                    <!-- Search Results -->
                    <div id="searchResults" class="row g-4 mb-4" style="display: none;">
                        <!-- Results will be populated here dynamically -->
                    </div>

                    <!-- Movie Form -->
                    <form id="movieForm" action="{{ route('admin.movies') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        <input type="hidden" name="tmdb_id" id="tmdb_id">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Movie Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="release_date">Release Date</label>
                                    <input type="date" class="form-control" id="release_date" name="release_date">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="overview">Overview</label>
                            <textarea class="form-control" id="overview" name="overview" rows="3"></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="runtime">Runtime (minutes)</label>
                                    <input type="number" class="form-control" id="runtime" name="runtime">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input type="number" step="0.1" class="form-control" id="rating" name="rating">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poster Preview</label>
                                    <img id="posterPreview" src="" class="img-fluid d-none" alt="Movie Poster">
                                    <input type="hidden" name="poster_path" id="poster_path">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Backdrop Preview</label>
                                    <img id="backdropPreview" src="" class="img-fluid d-none" alt="Movie Backdrop">
                                    <input type="hidden" name="backdrop_path" id="backdrop_path">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add Movie</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        const query = document.getElementById('movieSearch').value;

        console.log(query);
        if (query) {
            // Make API call to your backend TMDB search endpoint
            fetch(`https://api.themoviedb.org/3/movie/${query}?api_key=fa2b606083311c59bff2e6bd3ceeda84`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    displaySearchResults(data);
                })
                .catch(error => console.error('Error:', error));
        }
    });

    function displaySearchResults(result) {
        const container = document.getElementById('searchResults');
        container.style.display = 'flex';
        container.innerHTML = '';


        const card = document.createElement('div');
        card.className = 'col-md-4';
        card.innerHTML = `
                <div class="card">
                    <img src="https://image.tmdb.org/t/p/w500${result.poster_path}" class="card-img-top" alt="${result.title}">
                    <div class="card-body">
                        <h5 class="card-title">${result.title}</h5>
                        <p class="card-text">${result.release_date}</p>
                        <button class="btn btn-primary select-movie" data-movie='${JSON.stringify(result)}'>Select</button>
                    </div>
                </div>
            `;
        container.appendChild(card);


    }

    function populateForm(movie) {
        document.getElementById('movieForm').style.display = 'block';
        document.getElementById('tmdb_id').value = movie.id;
        document.getElementById('title').value = movie.title;
        document.getElementById('release_date').value = movie.release_date;
        document.getElementById('overview').value = movie.overview;
        document.getElementById('rating').value = movie.vote_average;
        document.getElementById('poster_path').value = movie.poster_path;
        document.getElementById('backdrop_path').value = movie.backdrop_path;

        // Show image previews
        const posterPreview = document.getElementById('posterPreview');
        const backdropPreview = document.getElementById('backdropPreview');

        posterPreview.src = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
        backdropPreview.src = `https://image.tmdb.org/t/p/w500${movie.backdrop_path}`;

        posterPreview.classList.remove('d-none');
        backdropPreview.classList.remove('d-none');
    }
</script>
@endpush