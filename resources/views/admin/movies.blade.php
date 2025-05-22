@extends('layouts.admin')

@section('content')

  <div class="main-content">
    <div class="header">
      <div class="page-title">Movies Management</div>
      <div class="admin-profile">
        <img src="/api/placeholder/40/40" alt="Admin">
        <span>Admin User</span>
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2 mb-2">
      <h3 class="fw-bold mb-0" style="color:var(--accent)">All Movies</h3>
      <a href="{{ route('admin.movie_add') }}"><button class="btn btn-primary d-flex align-items-center gap-2 px-4 py-2 mb-3" style="font-size:1rem; box-shadow:0 2px 8px rgba(0,168,255,0.10); margin-right: 0.5rem; margin-top: 0.5rem;">
        <i class="fas fa-plus"></i> Add New Movie
      </button></a>
    </div>

    <div class="movies-table-container p-0">
      <div class="table-responsive">
        <table class="movies-table table table-hover align-middle mb-0">
          <thead class="align-middle">
            <tr>
              <th>Movie</th>
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
            <tr>
              <td>
                <div class="movie-info">
                  <img src="/api/placeholder/50/75" alt="Dune" class="movie-poster">
                  <div class="movie-details">
                    <h4>Dune</h4>
                    <p>2h 35m • PG-13</p>
                  </div>
                </div>
              </td>
              <td>Denis Villeneuve</td>
              <td>2021</td>
              <td>Sci-Fi</td>
              <td>
                <div class="rating">
                  <div class="rating-stars">★★★★☆</div>
                  <div class="rating-number">7.8</div>
                </div>
              </td>
              <td>2.4M</td>
              <td>May 20, 2025</td>
              <td><span class="status-badge status-active">Active</span></td>
              <td>
                <div class="actions">
                  <button class="action-btn" title="View">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="action-btn" title="Edit">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="action-btn delete" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="movie-info">
                  <img src="/api/placeholder/50/75" alt="No Time to Die" class="movie-poster">
                  <div class="movie-details">
                    <h4>No Time to Die</h4>
                    <p>2h 43m • PG-13</p>
                  </div>
                </div>
              </td>
              <td>Cary Joji Fukunaga</td>
              <td>2021</td>
              <td>Action</td>
              <td>
                <div class="rating">
                  <div class="rating-stars">★★★★☆</div>
                  <div class="rating-number">8.3</div>
                </div>
              </td>
              <td>3.1M</td>
              <td>May 18, 2025</td>
              <td><span class="status-badge status-active">Active</span></td>
              <td>
                <div class="actions">
                  <button class="action-btn" title="View">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="action-btn" title="Edit">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="action-btn delete" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="movie-info">
                  <img src="/api/placeholder/50/75" alt="The Matrix Resurrections" class="movie-poster">
                  <div class="movie-details">
                    <h4>The Matrix Resurrections</h4>
                    <p>2h 28m • R</p>
                  </div>
                </div>
              </td>
              <td>Lana Wachowski</td>
              <td>2021</td>
              <td>Sci-Fi</td>
              <td>
                <div class="rating">
                  <div class="rating-stars">★★★★☆</div>
                  <div class="rating-number">7.5</div>
                </div>
              </td>
              <td>1.8M</td>
              <td>May 15, 2025</td>
              <td><span class="status-badge status-active">Active</span></td>
              <td>
                <div class="actions">
                  <button class="action-btn" title="View">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="action-btn" title="Edit">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="action-btn delete" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="movie-info">
                  <img src="/api/placeholder/50/75" alt="Spider-Man: No Way Home" class="movie-poster">
                  <div class="movie-details">
                    <h4>Spider-Man: No Way Home</h4>
                    <p>2h 28m • PG-13</p>
                  </div>
                </div>
              </td>
              <td>Jon Watts</td>
              <td>2021</td>
              <td>Action</td>
              <td>
                <div class="rating">
                  <div class="rating-stars">★★★★☆</div>
                  <div class="rating-number">8.1</div>
                </div>
              </td>
              <td>4.2M</td>
              <td>May 12, 2025</td>
              <td><span class="status-badge status-pending">Processing</span></td>
              <td>
                <div class="actions">
                  <button class="action-btn" title="View">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="action-btn" title="Edit">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="action-btn delete" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="movie-info">
                  <img src="/api/placeholder/50/75" alt="Eternals" class="movie-poster">
                  <div class="movie-details">
                    <h4>Eternals</h4>
                    <p>2h 36m • PG-13</p>
                  </div>
                </div>
              </td>
              <td>Chloé Zhao</td>
              <td>2021</td>
              <td>Action</td>
              <td>
                <div class="rating">
                  <div class="rating-stars">★★★☆☆</div>
                  <div class="rating-number">6.3</div>
                </div>
              </td>
              <td>1.2M</td>
              <td>May 10, 2025</td>
              <td><span class="status-badge status-inactive">Inactive</span></td>
              <td>
                <div class="actions">
                  <button class="action-btn" title="View">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="action-btn" title="Edit">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="action-btn delete" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="movie-info">
                  <img src="/api/placeholder/50/75" alt="Top Gun: Maverick" class="movie-poster">
                  <div class="movie-details">
                    <h4>Top Gun: Maverick</h4>
                    <p>2h 11m • PG-13</p>
                  </div>
                </div>
              </td>
              <td>Joseph Kosinski</td>
              <td>2022</td>
              <td>Action</td>
              <td>
                <div class="rating">
                  <div class="rating-stars">★★★★★</div>
                  <div class="rating-number">8.7</div>
                </div>
              </td>
              <td>5.1M</td>
              <td>May 08, 2025</td>
              <td><span class="status-badge status-active">Active</span></td>
              <td>
                  <button class="action-btn delete" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
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
    body, .main-content {
        background: var(--secondary) !important;
        color: var(--text);
    }
    .main-content {
        padding: 24px;
        background: var(--secondary);
        min-height: 100vh;
    }
    .header, .movies-header, .search-filter-bar, .movies-table-container, .bulk-actions {
        background: var(--primary);
        color: var(--text);
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.10);
    }
    .header, .movies-header {
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
  box-shadow: 0 2px 8px rgba(0,168,255,0.10);
  margin-right: 0.5rem;
  margin-top: 1.5rem;
  margin-bottom: 1.5rem;
    cursor: pointer;
}
.btn-primary:hover {
  background: #0088cc;
  color: #fff;
  box-shadow: 0 4px 16px rgba(0,168,255,0.18);
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
    .search-box input, .filter-select {
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
      box-shadow: 0 4px 16px rgba(0,0,0,0.10);
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
    .movies-table th, .movies-table td {
      padding: 1rem 0.75rem;
      vertical-align: middle;
    }
    @media (max-width: 991.98px) {
      .main-content {
        padding: 1rem;
      }
      .movies-table th, .movies-table td {
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
