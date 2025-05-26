@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="header">
        <div class="page-title">Add New Movie</div>
        <div class="admin-profile">
            <span>Admin User</span>
        </div>
    </div>

    <div class="movies-table-container">
        <form method="POST" action="{{ route('admin.movie_add.store') }}" enctype="multipart/form-data" class="movie-form" accept-charset="UTF-8">
            @csrf
            <!-- Max file size hint for PHP -->
            <input type="hidden" name="MAX_FILE_SIZE" value="4294967296" /> <!-- 4GB in bytes -->
            <!-- TMDB Section -->
            <div class="form-section">
                <div class="form-group tmdb-group">
                    <label for="tmdb_id" class="form-label">TMDB ID</label>
                    <div class="input-with-button">
                        <input type="text" class="form-control" id="tmdb_id" name="tmdb_id" required>
                        <button type="button" onclick="fetchMovieData(event)" class="btn btn-primary btn-generate">
                            <i class="fas fa-magic me-1"></i>Generate
                        </button>
                    </div>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="form-section">
                <h5 class="section-title">Basic Information</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="original_title" class="form-label">Original Title</label>
                        <input type="text" class="form-control" id="original_title" name="original_title" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control" id="release_date" name="release_date" required>
                    </div>
                    <div class="form-group">
                        <label for="runtime" class="form-label">Runtime (minutes)</label>
                        <input type="number" class="form-control" id="runtime" name="runtime" min="1">
                    </div>
                </div>
            </div>

            <!-- Movie Details -->
            <div class="form-section">
                <h5 class="section-title">Movie Details</h5>
                <div class="form-group">
                    <label for="overview" class="form-label">Overview</label>
                    <textarea class="form-control" id="overview" name="overview" rows="4" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tagline" class="form-label">Tagline</label>
                        <input type="text" class="form-control" id="tagline" name="tagline">
                    </div>
                    <div class="form-group">
                        <label for="original_language" class="form-label">Original Language</label>
                        <input type="text" class="form-control" id="original_language" name="original_language" maxlength="2">
                    </div>
                </div>
            </div>

            <!-- Ratings & Metrics -->
            <div class="form-section">
                <h5 class="section-title">Ratings & Metrics</h5>
                <div class="form-row three-columns">
                    <div class="form-group">
                        <label for="vote_average" class="form-label">Rating</label>
                        <input type="number" step="0.001" class="form-control" id="vote_average" name="vote_average" min="0" max="10">
                    </div>
                    <div class="form-group">
                        <label for="vote_count" class="form-label">Vote Count</label>
                        <input type="number" class="form-control" id="vote_count" name="vote_count">
                    </div>
                    <div class="form-group">
                        <label for="popularity" class="form-label">Popularity</label>
                        <input type="number" step="0.0001" class="form-control" id="popularity" name="popularity">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="budget" class="form-label">Budget</label>
                        <input type="number" class="form-control" id="budget" name="budget" min="0">
                    </div>
                    <div class="form-group">
                        <label for="revenue" class="form-label">Revenue</label>
                        <input type="number" class="form-control" id="revenue" name="revenue" min="0">
                    </div>
                </div>
            </div>

            <!-- Media -->
            <div class="form-section">
                <h5 class="section-title">Media</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label for="poster_path" class="form-label">Poster Path</label>
                        <input type="text" class="form-control" id="poster_path" name="poster_path">
                    </div>
                    <div class="form-group">
                        <label for="backdrop_path" class="form-label">Backdrop Path</label>
                        <input type="text" class="form-control" id="backdrop_path" name="backdrop_path">
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="form-section">
                <h5 class="section-title">Additional Information</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label for="imdb_id" class="form-label">IMDB ID</label>
                        <input type="text" class="form-control" id="imdb_id" name="imdb_id">
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="video" name="video">
                            <label class="form-check-label" for="video">Has Video</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="adult" name="adult">
                            <label class="form-check-label" for="adult">Adult Content</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- genres -->
            <div class="form-section">
                <h5 class="section-title">Genres</h5>
                <div class="form-group">
                    <label for="genres" class="form-label">Genres</label>
                    <input type="text" class="form-control" id="genres" name="genres">
                </div>
            </div>

            <div class="form-section">
                <h5 class="section-title">Trailer</h5>
                <div class="form-group">
                    <label for="trailer" class="form-label">Trailer URL</label>
                    <div class="trailer-input-group">
                        <input type="text" class="form-control" id="trailer" name="trailer" required placeholder="https://www.youtube.com/watch?v=...">
                        <div class="mt-2 trailer-preview" id="trailer-preview"></div>
                    </div>
                </div>
            </div>

            <!-- Upload Movie -->
            <div class="form-section">
                <h5 class="section-title">Upload Movie</h5>
                <div class="form-group">
                    <label for="movie_file" class="form-label">Movie File</label>
                    <input type="file" class="form-control" id="movie_file" name="movie_file" accept="video/mp4,video/x-matroska,video/quicktime">
                    <small class="text-muted">Supported formats: MP4, MKV, MOV (Max size: 4GB)</small>
                </div>
            </div>

            <!-- Submit Button -->
            <div class=" form-actions">
                <button type="submit" class="btn btn-primary btn-submit">
                    <i class="fas fa-save me-2"></i>Save Movie
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    .movies-table-container {
        background: var(--primary);
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
        margin: 2.5rem auto 0 auto;
        max-width: 800px;
        padding: 2.5rem;
    }

    .movie-form {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .form-section {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .section-title {
        color: var(--accent);
        font-weight: 600;
        font-size: 1.1rem;
        margin: 0 0 0.5rem 0;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--secondary);
    }

    .form-row {
        display: flex;
        gap: 1.25rem;
        align-items: flex-end;
    }

    .form-row.three-columns {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .form-group.full-width {
        width: 100%;
    }

    .form-group.half-width {
        flex: 1;
    }

    .tmdb-group {
        max-width: 400px;
    }

    .input-with-button {
        display: flex;
        gap: 0.75rem;
        align-items: flex-end;
    }

    .input-with-button .form-control {
        flex: 1;
        margin-bottom: 0;
    }

    .btn-generate {
        white-space: nowrap;
        padding: 0.7rem 1.25rem;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .movie-form .form-label {
        color: var(--accent);
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .movie-form .form-control,
    .movie-form .form-select,
    .movie-form textarea {
        background: var(--secondary);
        color: var(--text);
        border: 1.5px solid var(--primary);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: border-color 0.2s, box-shadow 0.2s;
        margin-bottom: 0;
    }

    .movie-form .form-control:focus,
    .movie-form .form-select:focus,
    .movie-form textarea:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 0.1rem var(--accent);
        background: var(--primary);
        color: var(--text);
        outline: none;
    }

    .movie-form .btn-primary {
        background: var(--accent);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 0.75rem 2rem;
        font-size: 1rem;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(0, 168, 255, 0.10);
    }

    .movie-form .btn-primary:hover {
        background: #0088cc;
        color: #fff;
        box-shadow: 0 4px 16px rgba(0, 168, 255, 0.18);
    }

    .form-actions {
        margin-top: 1rem;
        padding-top: 1.5rem;
        border-top: 2px solid var(--secondary);
    }

    .btn-submit {
        width: 100%;
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .movies-table-container {
            margin: 1.5rem 1rem 0 1rem;
            padding: 1.5rem;
            max-width: none;
        }

        .form-row {
            flex-direction: column;
            gap: 1rem;
        }

        .form-row.three-columns {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .form-group.half-width {
            width: 100%;
        }

        .tmdb-group {
            max-width: none;
        }

        .input-with-button {
            flex-direction: column;
            align-items: stretch;
            gap: 0.75rem;
        }

        .btn-generate {
            width: 100%;
        }

        .movie-form {
            gap: 1.5rem;
        }

        .section-title {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .movies-table-container {
            padding: 1rem;
        }

        .movie-form .btn-primary {
            font-size: 0.95rem;
            padding: 0.7rem 1.5rem;
        }

        .btn-submit {
            font-size: 1rem;
            padding: 0.85rem 1.5rem;
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {
        .form-row.three-columns {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-row.three-columns .form-group:last-child {
            grid-column: 1 / -1;
        }
    }

    /* Trailer Section Styles */
    .trailer-input-group {
        width: 100%;
    }

    .trailer-preview {
        border-radius: 8px;
        overflow: hidden;
        background: var(--secondary);
        display: none;
    }

    .trailer-preview.active {
        display: block;
    }

    .trailer-preview iframe {
        width: 100%;
        aspect-ratio: 16/9;
        border: none;
    }
</style>

@push('scripts')
<script>
    function fetchMovieData(event) {
        const tmdbId = document.getElementById("tmdb_id").value;
        fetch("{{ route('movies.search') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    tmdb_id: tmdbId
                }),
            })
            .then((res) => res.json()).then((data) => {
                console.log(data);
                // Set the movie details from TMDB data
                document.getElementById("tmdb_id").value = data.tmdb_id;
                document.getElementById("title").value = data.title;
                document.getElementById("original_title").value = data.original_title;
                document.getElementById("release_date").value = data.release_date;
                document.getElementById("runtime").value = data.runtime;
                document.getElementById("overview").value = data.overview;
                document.getElementById("poster_path").value = data.poster_path;
                document.getElementById("backdrop_path").value = data.backdrop_path;
                document.getElementById("vote_average").value = data.vote_average;
                document.getElementById("vote_count").value = data.vote_count;
                document.getElementById("popularity").value = data.popularity;
                document.getElementById("tagline").value = data.tagline;
                document.getElementById("budget").value = data.budget;
                document.getElementById("revenue").value = data.revenue;
                document.getElementById("imdb_id").value = data.imdb_id;
                document.getElementById("original_language").value = data.original_language;
                document.getElementById("video").value = data.video;
                document.getElementById("adult").value = data.adult;
                document.getElementById('genres').value = data.genres.map(genre => genre.name).join(', ');
            })


        fetch("{{ route('movies.trailer') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    tmdb_id: tmdbId
                }),
            })
            .then((res) => res.json()).then((data) => {
                if (data.results && data.results.length > 0) {
                    const ytKey = data.results[0].key;
                    const trailerUrl = `https://www.youtube.com/watch?v=${ytKey}`;
                    document.getElementById("trailer").value = trailerUrl;
                    updateTrailerPreview(trailerUrl);
                }
            })
            .catch(error => {
                console.error('Error fetching trailer:', error);
            });
    }

    // Function to update trailer preview
    function updateTrailerPreview(url) {
        const previewDiv = document.getElementById('trailer-preview');
        let videoId = '';

        // Extract video ID from different YouTube URL formats
        if (url.includes('youtube.com/watch?v=')) {
            videoId = url.split('v=')[1].split('&')[0];
        } else if (url.includes('youtu.be/')) {
            videoId = url.split('youtu.be/')[1];
        }

        if (videoId) {
            const embedUrl = `https://www.youtube.com/embed/${videoId}`;
            previewDiv.innerHTML = `<iframe src="${embedUrl}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            previewDiv.classList.add('active');
        } else {
            previewDiv.innerHTML = '';
            previewDiv.classList.remove('active');
        }
    }

    // Listen for changes in the trailer input
    document.getElementById('trailer').addEventListener('input', function(e) {
        updateTrailerPreview(e.target.value);
    });
</script>
@endpush