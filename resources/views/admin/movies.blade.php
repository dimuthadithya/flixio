@extends('layouts.admin')

@section('content')

<div class="main-content">
  <div class="header">
    <div class="page-title">Movies Management</div>
    <div class="admin-profile">
      <span>Admin User</span>
    </div>
  </div>

  <div class="flex-wrap gap-2 mb-2 mb-4 d-flex justify-content-between align-items-center">
    <h3 class="mb-0 fw-bold" style="color:var(--accent)">All Movies</h3>
    <a href="{{ route('admin.movie_add') }}"><button class="gap-2 px-4 py-2 mb-3 btn btn-primary d-flex align-items-center" style="font-size:1rem; box-shadow:0 2px 8px rgba(0,168,255,0.10); margin-right: 0.5rem; margin-top: 0.5rem;">
        <i class="fas fa-plus"></i> Add New Movie
      </button></a>
  </div>

  <div class="p-0 movies-table-container">
    <div class="table-responsive">
      <table class="table mb-0 align-middle movies-table table-hover">
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
</style>