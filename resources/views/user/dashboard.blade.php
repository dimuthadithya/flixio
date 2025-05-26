<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlixIO User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #032541;
            --secondary-color: #01b4e4;
            --accent-color: #90cea1;
            --dark-bg: #051829;
            --card-bg: #0a2133;
            --light-text: #f8f9fa;
            --muted-text: #adb5bd;
        }

        body {
            background: var(--dark-bg);
            color: var(--light-text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: var(--primary-color);
            padding: 0.5rem 1rem;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand span {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }

        .navbar-brand span:first-child {
            color: var(--light-text);
        }

        .navbar-brand span:last-child {
            color: var(--secondary-color);
        }

        .search-form {
            position: relative;
            width: 100%;
            max-width: 300px;
        }

        .search-form input {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light-text);
            border-radius: 20px;
            padding-right: 40px;
        }

        .search-form input:focus {
            background-color: rgba(255, 255, 255, 0.15);
            color: var(--light-text);
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(1, 180, 228, 0.15);
        }

        .search-form button {
            position: absolute;
            right: 5px;
            top: 0;
            border: none;
            background: transparent;
            color: var(--secondary-color);
            padding: 0.375rem 0.75rem;
        }

        .navbar-nav .nav-link {
            color: var(--light-text);
            margin: 0 5px;
            position: relative;
            font-weight: 500;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: var(--secondary-color);
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--secondary-color);
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, #03355f 100%);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            margin-top: 1.5rem;
            height: 90vh;
        }

        .user-profile {
            text-align: center;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1.5rem;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--secondary-color);
            padding: 3px;
            background: var(--dark-bg);
            box-shadow: 0 4px 12px rgba(1, 180, 228, 0.2);
            margin-bottom: 1rem;
        }

        .user-name {
            color: var(--light-text);
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 0.25rem;
        }

        .member-badge {
            background: linear-gradient(90deg, var(--secondary-color) 0%, var(--accent-color) 100%);
            color: var(--dark-bg);
            font-size: 0.7rem;
            padding: 3px 10px;
            border-radius: 12px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .nav-pills .nav-link {
            color: var(--light-text);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }

        .nav-pills .nav-link.active,
        .nav-pills .nav-link:hover {
            background: rgba(1, 180, 228, 0.15);
            color: var(--secondary-color);
        }

        .main-content {
            padding: 1.5rem;
        }

        .page-title {
            font-weight: 700;
            color: var(--light-text);
            margin-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 0.75rem;
        }

        .card {
            background: var(--card-bg);
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background: rgba(1, 180, 228, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1rem 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            border-radius: 16px 16px 0 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-label {
            color: var(--secondary-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background: rgba(10, 33, 51, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light-text);
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            background: rgba(10, 33, 51, 0.8);
            border-color: var(--secondary-color);
            color: var(--light-text);
            box-shadow: 0 0 0 0.2rem rgba(1, 180, 228, 0.15);
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--secondary-color) 0%, var(--accent-color) 100%);
            border: none;
            color: var(--dark-bg);
            font-weight: 600;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, var(--accent-color) 0%, var(--secondary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(1, 180, 228, 0.3);
        }

        .watchlist-item {
            background: rgba(10, 33, 51, 0.6);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .watchlist-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .watchlist-poster {
            width: 80px;
            min-width: 80px;
            height: 120px;
            object-fit: cover;
        }

        .watchlist-content {
            padding: 1rem;
            flex-grow: 1;
        }

        .watchlist-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .watchlist-title .year {
            color: var(--muted-text);
            font-size: 0.9rem;
            margin-left: 0.5rem;
        }

        .watchlist-rating {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .watchlist-rating i {
            color: #ffc107;
            margin-right: 0.25rem;
        }

        .watchlist-rating span {
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .watchlist-genre {
            color: var(--muted-text);
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .watchlist-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.85rem;
            border-radius: 6px;
        }

        .btn-outline-secondary {
            border-color: var(--secondary-color);
            color: var(--secondary-color);
        }

        .btn-outline-secondary:hover {
            background-color: var(--secondary-color);
            color: var(--dark-bg);
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: var(--light-text);
        }

        .preferences-list {
            list-style: none;
            padding: 0;
            margin-bottom: 1.5rem;
        }

        .preference-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .preference-item:last-child {
            border-bottom: none;
        }

        .preference-label {
            font-weight: 500;
        }

        .form-switch .form-check-input {
            width: 2.5em;
            height: 1.25em;
        }

        .form-check-input:checked {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .activity-list {
            list-style: none;
            padding: 0;
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .activity-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .activity-icon {
            background: rgba(1, 180, 228, 0.15);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 1rem;
            color: var(--secondary-color);
        }

        .activity-content {
            flex-grow: 1;
        }

        .activity-time {
            color: var(--muted-text);
            font-size: 0.85rem;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 767.98px) {
            .navbar-brand span {
                font-size: 1.2rem;
            }

            .profile-img {
                width: 80px;
                height: 80px;
            }

            .main-content {
                padding: 1rem 0.5rem;
            }

            .card-body {
                padding: 1rem;
            }

            .watchlist-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .watchlist-poster {
                width: 100%;
                height: 180px;
                min-width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="user-profile">
                        <a class="text-center"
                            style="font-weight: 700; font-size: 2.2rem; color: #f8f9fa; text-decoration: none;"
                            href="{{ route('welcome') }}"><span style="font-size: 3.7rem;">F</span>li <span
                                style="color: #01b4e4; font-size: 2.7rem;">Xio</span></a>
                        <h5 class="user-name">{{ Auth::user()->name ?? 'John Doe' }}</h5>
                        <span class="member-badge">Member</span>
                        <p class="text-light mb-0">Joined on -
                            {{ Auth::user()->created_at->format('Y-m-d') ?? 'yH4tT@example.com' }}</p>
                    </div>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile"
                            type="button">
                            <i class="fas fa-user-circle"></i> My Profile
                        </button>
                        <button class="nav-link" id="watchlist-tab" data-bs-toggle="pill" data-bs-target="#watchlist"
                            type="button">
                            <i class="fas fa-list"></i> My Watchlist
                        </button>
                        <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security"
                            type="button">
                            <i class="fas fa-shield-alt"></i> Security
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link text-danger">
                                <i class="fas fa-sign-out-alt"></i> Sign Out
                            </button>
                        </form>

                        </a>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="main-content">
                    <h2 class="page-title">Account Settings</h2>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0" style="list-style: none; padding: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="tab-content">
                        <!-- Profile Tab -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-user-edit me-2"></i> Profile Information
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ Auth::user()->name ?? 'John Do' }}" autocomplete="off"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ Auth::user()->email ?? 'john.doe@example.com' }}"
                                            autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Watchlist Tab -->
                        <div class="tab-pane fade" id="watchlist" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-list me-2"></i> My Watchlist
                                </div>
                                <div class="card-body">

                                    @foreach ($watchlists as $watchlist)
                                        <div class="watchlist-item">
                                            <img src="{{ 'https://image.tmdb.org/t/p/w500' . $watchlist['poster_path'] }}"
                                                alt="Movie Poster" class="watchlist-poster">
                                            <div class="watchlist-content">
                                                <h5 class="watchlist-title text-white">
                                                    {{ $watchlist['title'] }} <span
                                                        class="year">({{ $watchlist['release_date'] }})</span>
                                                </h5>
                                                <div class="watchlist-rating">
                                                    <i class="fas fa-star"></i>
                                                    <span class="text-white">{{ $watchlist['vote_average'] }}</span>
                                                    <span class="text-white">{{ $watchlist['genres'] }}</span>
                                                </div>
                                                <div class="watchlist-genre">{{ $watchlist['runtime'] }} min</div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if (!$watchlists)
                                        <div class="alert alert-info">
                                            Your watchlist is empty. Start adding movies to your watchlist!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Security Tab -->
                        <div class="tab-pane fade" id="security" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-lock me-2"></i> Password & Security
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user.updatePassword') }}">
                                        @csrf
                                        @method('PUT')






                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Current Password</label>
                                            <input type="password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                id="current_password" name="current_password">
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="new_password" class="form-label">New Password (8+ characters)</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="new_password" name="password">
                                            <div class="form-text text-muted">
                                                Password must be at least 8 characters and include a mix of letters,
                                                numbers and symbols.
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm New
                                                Password</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" name="updatePassword" class="btn btn-primary">Update
                                            Password</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
