@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="header">
        <div class="page-title">Dashboard</div>
        <div class="admin-profile">
            <span>Admin User</span>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="stat-cards">
        <div class="stat-card">
            <div class="stat-card-title">Total Movies</div>
            <div class="stat-card-value">
                <div>
                    {{ number_format($moviesCount) }}
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-film"></i>
                </div>
            </div>
        </div>
        <div class="stat-card users">
            <div class="stat-card-title">Total Users</div>
            <div class="stat-card-value">
                <div>{{ number_format($userCount) }}</div>
                <div class="stat-card-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>


    <!-- Recent Movies -->
    <div class="content-section">
        <div class="section-header">
            <div class="section-title">Recently Added Movies</div>
            <div>
                <button class="section-action">View All</button>
            </div>
        </div>
        <table class="recent-table">
            <thead>
                <tr>
                    <th>Movie</th>
                    <th>Date Added</th>
                    <th>Category</th>
                    <th>Rating</th>
                    <th>Release Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentlyAddedMovies as $movie )
                <tr>
                    <td>
                        <div class="movie-info">
                            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="Movie" class="movie-poster">
                            <div>{{ $movie['title'] }}</div>
                        </div>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($movie['created_at'])->format('M d, Y') }}</td>
                    <td>{{ $movie['genres'] }}</td>
                    <td>{{ $movie['vote_average'] }}</td>
                    <td><span class="status-badge status-active">{{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</span></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Recent Users -->
    <div class="content-section">
        <div class="section-header">
            <div class="section-title">Recent Users</div>
            <div>
                <button class="section-action">View All</button>
            </div>
        </div>
        <div class="user-list">
            @foreach ($recentlyAddedUsers as $user)
            <div class="user-card">
                <img src="/api/placeholder/50/50" alt="User" class="user-avatar">
                <div class="user-info">
                    <div class="user-name">{{ $user['name'] }}</div>
                    <div class="user-email">{{ $user['email'] }}</div>
                    <div class="user-status">
                        <span class="status-dot dot-active"></span> Active
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>

@endsection