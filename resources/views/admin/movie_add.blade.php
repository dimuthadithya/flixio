@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="header">
        <div class="page-title">Add New Movie</div>
        <div class="admin-profile">
            <img src="/api/placeholder/40/40" alt="Admin">
            <span>Admin User</span>
        </div>
    </div>

    <div class="movies-table-container">
        <form method="POST" action="#" enctype="multipart/form-data" class="movie-form">
            <!-- TMDB Section -->
            <div class="form-section">
                <div class="form-group tmdb-group">
                    <label for="tmdb_id" class="form-label">TMDB ID</label>
                    <div class="input-with-button">
                        <input type="text" class="form-control" id="tmdb_id" name="tmdb_id" required>
                        <button type="button" onclick="fetchMovieData(event)" class="btn btn-primary btn-generate" data-bs-toggle="modal" data-bs-target="#tmdbModal">
                            <i class="fas fa-magic me-1"></i>Generate
                        </button>
                    </div>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="form-section">
                <h5 class="section-title">Basic Information</h5>
                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="title" class="form-label">Movie Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="trailer" class="form-label">Trailer</label>
                        <input type="text" class="form-control" id="trailer" name="trailer" required>
                    </div>
                    <div class="form-group half-width">
                        <label for="release_year" class="form-label">Release Year</label>
                        <input type="number" class="form-control" id="release_year" name="release_year" min="1900" max="2100" required>
                    </div>
                </div>
            </div>

            <!-- Details -->
            <div class="form-section">
                <h5 class="section-title">Movie Details</h5>
                <div class="form-row three-columns">
                    <div class="form-group">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="form-group">
                        <label for="duration" class="form-label">Duration (min)</label>
                        <input type="number" class="form-control" id="duration" name="duration" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="rating" class="form-label">Rating (0-10)</label>
                        <input type="number" step="0.1" class="form-control" id="rating" name="rating" min="0" max="10" required>
                    </div>
                </div>
            </div>

            <!-- Media & Status -->
            <div class="form-section">
                <h5 class="section-title">Media & Status</h5>
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="poster" class="form-label">Poster Image URL</label>
                        <input type="text" class="form-control" id="poster" name="poster" placeholder="https://example.com/poster.jpg">
                    </div>
                    <div class="form-group half-width">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="form-section">
                <div class="form-group full-width">
                    <label for="description" class="form-label">Movie Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Enter a detailed description of the movie..."></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
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
                document.getElementById("title").value = data.original_title;
                // Release year - extract year from release_date
                const releaseYear = new Date(data.release_date).getFullYear();
                document.getElementById("release_year").value = releaseYear;
                // Join genres into a string
                const categories = data.genres.map(genre => genre.name).join(', ');
                document.getElementById("category").value = categories;
                // Set duration (runtime)
                document.getElementById("duration").value = data.runtime;
                // Set rating (vote_average)
                document.getElementById("rating").value = data.vote_average;
                // Set poster (construct full URL)
                document.getElementById("poster").value = `https://image.tmdb.org/t/p/original${data.poster_path}`;
                // Set description (overview)
                document.getElementById("description").value = data.overview;


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
                console.log(data.results[0].key);

                $ytKey = data.results[0].key;
                // Set trailer URL
                document.getElementById("trailer").value = `https://www.youtube.com/watch?v=${$ytKey}`;
            })

    }
</script>
@endpush