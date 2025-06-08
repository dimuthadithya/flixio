<tr>
  <td class="movie-cell">
    <div class="movie-media">
      <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] }}"
        alt="{{ $movie['title'] }}"
        class="movie-poster">
      <div class="movie-details">
        <h6 class="movie-title">{{ $movie['title'] }}</h6>
        <small class="movie-original-title">{{ $movie['original_title'] }}</small>
      </div>
    </div>
  </td>
  <td class="info-cell">{{ $movie['director'] ?? 'N/A' }}</td>
  <td class="info-cell">{{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</td>
  <td class="info-cell">
    @if(is_array($movie['genres']))
    {{ collect($movie['genres'])->pluck('name')->implode(', ') }}
    @else
    {{ $movie['genres'] ?? 'N/A' }}
    @endif
  </td>
  <td class="info-cell">
    <div class="rating-display">
      <i class="fas fa-star text-warning"></i>
      <span>{{ number_format($movie['vote_average'], 1) }}</span>
    </div>
  </td>
  <td class="info-cell">{{ $movie['views'] ?? 0 }}</td>
  <td class="info-cell">{{ \Carbon\Carbon::parse($movie['created_at'])->format('M d, Y') }}</td>
  <td class="info-cell">
    <span class="status-badge status-{{ $movie['status'] }}">
      {{ ucfirst($movie['status']) }}
    </span>
  </td>
  <td class="action-cell">
    <div class="action-buttons">
      <button type="button" class="btn btn-sm btn-outline-primary edit-movie-btn" onclick="editMovie({{ $movie['id'] }})" title="Edit">
        <i class="fas fa-edit"></i>
      </button>
      <form action="{{ route('admin.movie.delete', $movie['id']) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this movie?')" title="Delete">
          <i class="fas fa-trash"></i>
        </button>
      </form>
    </div>
  </td>
</tr>

<style>
  /* Global movie card styles */
  .movie-cell {
    min-width: 300px;
    padding: 12px !important;
  }

  .movie-media {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .movie-poster {
    width: 48px;
    height: 72px;
    object-fit: cover;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .movie-details {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  .movie-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text);
    margin: 0;
    line-height: 1.2;
  }

  .movie-original-title {
    font-size: 0.8rem;
    color: var(--text-secondary);
  }

  /* Info cells styling */
  .info-cell {
    padding: 12px !important;
    vertical-align: middle !important;
    color: var(--text);
    font-size: 0.9rem;
    white-space: nowrap;
  }

  /* Rating display */
  .rating-display {
    display: flex;
    align-items: center;
    gap: 6px;
  }

  /* Status badges */
  .status-badge {
    display: inline-block;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    text-align: center;
    min-width: 80px;
  }

  .status-active {
    background-color: rgba(46, 204, 113, 0.1);
    color: #2ecc71;
  }

  .status-inactive {
    background-color: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
  }

  .status-pending {
    background-color: rgba(243, 156, 18, 0.1);
    color: #f39c12;
  }

  /* Action buttons */
  .action-cell {
    padding: 12px !important;
    white-space: nowrap;
  }

  .action-buttons {
    display: flex;
    gap: 8px;
    align-items: center;
  }

  .btn-outline-primary,
  .btn-outline-danger {
    color: var(--accent);
    border-color: var(--accent);
    padding: 0.3rem 0.6rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
  }

  .btn-outline-danger {
    color: var(--danger);
    border-color: var(--danger);
  }

  .btn-outline-primary:hover {
    background-color: var(--accent);
    color: #fff;
    transform: translateY(-1px);
  }

  .btn-outline-danger:hover {
    background-color: var(--danger);
    color: #fff;
    transform: translateY(-1px);
  }

  .action-buttons .fas {
    font-size: 0.875rem;
  }

  .btn-outline-danger {
    color: var(--danger);
    border-color: var(--danger);
    padding: 0.3rem 0.6rem;
    transition: all 0.2s ease;
  }

  .btn-outline-danger:hover {
    background-color: var(--danger);
    color: #fff;
    transform: translateY(-1px);
  }
</style>