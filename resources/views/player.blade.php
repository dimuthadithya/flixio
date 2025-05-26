@extends('layouts.app')

@section('content')
<div class="movie-player-container">
    <!-- Back Button -->
    <div class="back-button-container">
        <a href="{{ url()->previous() }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back to Movie
        </a>
    </div>

    <!-- Video Player -->
    <div class="player-wrapper">
        @if($movie['movie_file'])
        <video id="moviePlayer" class="video-player" controls controlsList="nodownload">
            <source src="{{ asset('storage/' . $movie['movie_file']) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @elseif($movie['download_link'])
        <video id="moviePlayer" class="video-player" controls controlsList="nodownload">
            <source src="{{ $movie['download_link'] }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @else
        <div class="no-video-message">
            <i class="fas fa-exclamation-circle"></i>
            <p>This movie is not available for streaming at the moment.</p>
        </div>
        @endif
    </div>

    <!-- Movie Info -->
    <div class="movie-info">
        <h1 class="movie-title">{{ $movie['title'] }}</h1>
        <div class="movie-meta">
            <span><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</span>
            <span><i class="fas fa-clock"></i> {{ $movie['runtime'] }} min</span>
            <span><i class="fas fa-star text-warning"></i> {{ number_format($movie['vote_average'], 1) }}</span>
        </div>
    </div>
</div>

<style>
    .movie-player-container {
        background: var(--primary);
        min-height: calc(100vh - 60px);
        padding: 2rem 0;
    }

    .back-button-container {
        max-width: 1400px;
        margin: 0 auto 1rem;
        padding: 0 1rem;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        color: var(--text);
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.2s;
        background: rgba(255, 255, 255, 0.1);
    }

    .btn-back:hover {
        background: rgba(255, 255, 255, 0.2);
        color: var(--accent);
    }

    .btn-back i {
        margin-right: 0.5rem;
    }

    .player-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        background: #000;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        aspect-ratio: 16/9;
    }

    .video-player {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #000;
    }

    .no-video-message {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: var(--text);
    }

    .no-video-message i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: var(--accent);
    }

    .movie-info {
        max-width: 1400px;
        margin: 2rem auto 0;
        padding: 0 1rem;
    }

    .movie-title {
        color: var(--text);
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .movie-meta {
        display: flex;
        gap: 2rem;
        color: var(--text);
        opacity: 0.8;
    }

    .movie-meta span {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    @media (max-width: 768px) {
        .movie-player-container {
            padding: 1rem 0;
        }

        .player-wrapper {
            border-radius: 0;
        }

        .movie-title {
            font-size: 1.5rem;
        }

        .movie-meta {
            gap: 1rem;
            flex-wrap: wrap;
        }
    }
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('moviePlayer');
        if (video) {
            // Save video progress
            video.addEventListener('timeupdate', function() {
                localStorage.setItem('movieProgress_{{ $movie["id"] }}', video.currentTime);
            });

            // Restore video progress
            const savedTime = localStorage.getItem('movieProgress_{{ $movie["id"] }}');
            if (savedTime) {
                video.currentTime = parseFloat(savedTime);
            }
        }
    });
</script>
@endpush
@endsection