@extends('layouts.admin')

@section('content')

<div class="main-content">
  <div class="header">
    <div class="page-title">Movies Management</div>
    <div class="admin-profile">
      <span class="badge" style="background: #3cd866; padding: 4px 15px; border-radius: 15px; font-weight: 600; color: #fff">{{ Auth::user()->name }}</span>
    </div>
  </div>

  <div class="flex-wrap gap-2 mb-4 d-flex justify-content-between align-items-center">
    <h3 class="mb-0 fw-bold" style="color:var(--accent)">All Movies</h3>
    <a href="{{ route('admin.movie_add') }}"><button class="gap-2 px-4 py-2 mb-3 btn btn-primary d-flex align-items-center" style="font-size:1rem; box-shadow:0 2px 8px rgba(0,168,255,0.10); margin-right: 0.5rem; margin-top: 0.5rem;">
        <i class="fas fa-plus"></i> Add New Movie
      </button></a>
  </div>

  <div class="p-0 movies-table-container">
    <div class="table-responsive">
      <table class="mb-0 align-middle movies-table table-hover">
        <thead class="align-middle">
          <tr>
            <th class="text-start">Movie</th>
            <th>Director</th>
            <th>Release Year</th>
            <th>Category</th>
            <th>Rating</th>
            <th>Views</th>
            <th>Date Added</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($movies as $movie)
          <x-movie-card-admin :movie="$movie" />
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Edit Movie Modal -->
<div class="modal fade" id="editMovieModal" tabindex="-1" aria-labelledby="editMovieModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="editMovieModalLabel">Edit Movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editMovieForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <!-- Basic Information -->
          <div class="mb-4 row">
            <h6 class="mb-3 text-accent">Basic Information</h6>
            <div class="mb-3 col-md-6">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="edit_title" name="title" required>
            </div>
            <div class="mb-3 col-md-6">
              <label for="original_title" class="form-label">Original Title</label>
              <input type="text" class="form-control" id="edit_original_title" name="original_title" required>
            </div>
            <div class="mb-3 col-md-6">
              <label for="release_date" class="form-label">Release Date</label>
              <input type="date" class="form-control" id="edit_release_date" name="release_date" required>
            </div>
            <div class="mb-3 col-md-6">
              <label for="runtime" class="form-label">Runtime (minutes)</label>
              <input type="number" class="form-control" id="edit_runtime" name="runtime" min="1">
            </div>
          </div>

          <!-- Movie Details -->
          <div class="mb-4 row">
            <h6 class="mb-3 text-accent">Movie Details</h6>
            <div class="mb-3 col-12">
              <label for="overview" class="form-label">Overview</label>
              <textarea class="form-control" id="edit_overview" name="overview" rows="3" required></textarea>
            </div>
            <div class="mb-3 col-md-6">
              <label for="genres" class="form-label">Genres</label>
              <input type="text" class="form-control" id="edit_genres" name="genres">
            </div>
            <div class="mb-3 col-md-6">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="edit_status" name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="pending">Pending</option>
              </select>
            </div>
          </div>

          <!-- Media -->
          <div class="mb-4 row">
            <h6 class="mb-3 text-accent">Media</h6>
            <div class="mb-3 col-md-12">
              <label for="trailer" class="form-label">Trailer URL</label>
              <input type="text" class="form-control" id="edit_trailer" name="trailer">
            </div>
            <div class="mb-3 col-md-12">
              <label for="movie_file" class="form-label">Movie File</label>
              <input type="file" class="form-control" id="edit_movie_file" name="movie_file" accept="video/mp4,video/x-matroska,video/quicktime">
              <small class="form-text">Supported formats: MP4, MKV, MOV (Max size: 4GB)</small>
            </div>
          </div>

          <!-- Ratings -->
          <div class="row">
            <h6 class="mb-3 text-accent">Ratings</h6>
            <div class="mb-3 col-md-4">
              <label for="vote_average" class="form-label">Rating (0.0 - 10.0)</label>
              <input type="number" step="0.1" class="form-control" id="edit_vote_average" name="vote_average" min="0" max="10" required>
              <div class="form-text">Enter a value between 0.0 and 10.0</div>
            </div>
            <div class="mb-3 col-md-4">
              <label for="vote_count" class="form-label">Vote Count</label>
              <input type="number" class="form-control" id="edit_vote_count" name="vote_count" min="0" required>
            </div>
            <div class="mb-3 col-md-4">
              <label for="popularity" class="form-label">Popularity</label>
              <input type="number" step="0.001" class="form-control" id="edit_popularity" name="popularity" min="0" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

<style>
  :root {
    --primary: #1a242f;
    --secondary: #0d151e;
    --accent: #00a8ff;
    --text: #ffffff;
    --text-secondary: #a0a0a0;
    --success: #2ecc71;
    --warning: #f39c12;
    --danger: #e74c3c;
  }

  body,
  .main-content {
    background: var(--secondary) !important;
    color: var(--text);
  }

  .main-content {
    padding: 24px;
    background: var(--secondary);
    min-height: 100vh;
  }

  .header,
  .movies-header,
  .search-filter-bar,
  .movies-table-container,
  .bulk-actions {
    background: var(--primary);
    color: var(--text);
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
  }

  .header,
  .movies-header {
    margin-bottom: 1.5rem;
    padding: 1.2rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .page-title {
    font-size: 2rem;
    font-weight: bold;
    color: var(--accent);
  }

  .admin-profile img {
    border: 2px solid var(--accent);
  }

  .movies-stats .stat-number {
    color: var(--accent);
  }

  .stat-label {
    color: var(--text-secondary);
  }

  .btn-primary {
    background: var(--accent);
    color: #fff;
    border: none;
    padding: 0.75rem 2rem;
    font-size: 1rem;
    border-radius: 8px;
    font-weight: 500;
    transition: background 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(0, 168, 255, 0.10);
    margin-right: 0.5rem;
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
    cursor: pointer;
  }

  .btn-primary:hover {
    background: #0088cc;
    color: #fff;
    box-shadow: 0 4px 16px rgba(0, 168, 255, 0.18);
  }

  .btn-secondary {
    background: var(--secondary);
    color: var(--text);
    border: 1px solid var(--accent);
  }

  .btn-secondary:hover {
    background: var(--accent);
    color: #fff;
  }

  .search-filter-bar {
    margin-bottom: 1.5rem;
    padding: 1rem 2rem;
    gap: 1rem;
  }

  .search-box input,
  .filter-select {
    background: var(--secondary);
    color: var(--text);
    border: 1px solid var(--primary);
  }

  .search-box input::placeholder {
    color: var(--text-secondary);
  }

  .movies-table-container {
    background: var(--primary);
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
    padding: 0;
    overflow-x: auto;
  }

  .table-responsive {
    width: 100%;
    overflow-x: auto;
  }

  .movies-table {
    min-width: 900px;
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
  }

  .movies-table th,
  .movies-table td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
  }

  @media (max-width: 991.98px) {
    .main-content {
      padding: 1rem;
    }

    .movies-table th,
    .movies-table td {
      padding: 0.75rem 0.5rem;
      font-size: 0.95rem;
    }

    .movie-details h4 {
      font-size: 0.95rem;
    }
  }

  @media (max-width: 767.98px) {
    .main-content {
      padding: 0.5rem;
    }

    .movies-table {
      min-width: 700px;
      font-size: 0.92rem;
    }

    .movie-poster {
      width: 36px;
      height: 54px;
    }

    .d-flex.justify-content-between.align-items-center.mb-4.flex-wrap.gap-2 {
      flex-direction: column;
      align-items: stretch !important;
      gap: 0.75rem;
    }

    .btn-primary {
      width: 100%;
      margin-right: 0;
      margin-top: 0.5rem;
    }
  }

  /* Modal Styles */
  .modal-content {
    background-color: var(--primary);
    color: var(--text);
  }

  .modal-header,
  .modal-footer {
    border-color: var(--secondary);
  }

  .modal .form-control,
  .modal .form-select {
    background: var(--secondary);
    color: var(--text);
    border: 1px solid rgba(255, 255, 255, 0.1);
  }

  .modal .form-control:focus,
  .modal .form-select:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 0.2rem rgba(0, 168, 255, 0.25);
  }

  .modal .form-label {
    color: var(--text);
    font-weight: 500;
  }

  .text-accent {
    color: var(--accent) !important;
    font-weight: 600;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid var(--secondary);
  }

  .modal .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%);
  }

  .modal .form-text {
    color: var(--text-secondary);
  }
</style>

@push('scripts')
<script>
  function editMovie(id) {
    // Show loading state
    const modal = new bootstrap.Modal(document.getElementById('editMovieModal'));
    modal.show();

    // Fetch movie data
    fetch(`/admin/movies/${id}/edit`)
      .then(response => response.json())
      .then(movie => {
        // Update form action
        document.getElementById('editMovieForm').action = `/admin/movies/${id}`;

        // Format release date to YYYY-MM-DD for input type="date"
        const releaseDate = new Date(movie.release_date);
        const formattedDate = releaseDate.toISOString().split('T')[0];

        // Populate form fields
        document.getElementById('edit_title').value = movie.title;
        document.getElementById('edit_original_title').value = movie.original_title;
        document.getElementById('edit_release_date').value = formattedDate;
        document.getElementById('edit_runtime').value = movie.runtime;
        document.getElementById('edit_overview').value = movie.overview;
        document.getElementById('edit_genres').value = movie.genres;
        document.getElementById('edit_status').value = movie.status;
        document.getElementById('edit_trailer').value = movie.trailer;
        document.getElementById('edit_vote_average').value = movie.vote_average;
        document.getElementById('edit_vote_count').value = movie.vote_count;
        document.getElementById('edit_popularity').value = movie.popularity;
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Error loading movie data');
        modal.hide();
      });
  }
</script>
@endpush