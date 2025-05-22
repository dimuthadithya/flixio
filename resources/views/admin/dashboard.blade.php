@extends('layouts.admin')
        
@section('content')
        <div class="main-content">
            <div class="header">
                <div class="page-title">Dashboard</div>
                <div class="admin-profile">
                    <img src="/api/placeholder/40/40" alt="Admin">
                    <span>Admin User</span>
                </div>
            </div>
            
            <!-- Stat Cards -->
            <div class="stat-cards">
                <div class="stat-card">
                    <div class="stat-card-title">Total Movies</div>
                    <div class="stat-card-value">
                        <div>1,247</div>
                        <div class="stat-card-icon">
                            <i class="fas fa-film"></i>
                        </div>
                    </div>
                </div>
                <div class="stat-card users">
                    <div class="stat-card-title">Total Users</div>
                    <div class="stat-card-value">
                        <div>45,289</div>
                        <div class="stat-card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="stat-card revenue">
                    <div class="stat-card-title">Monthly Revenue</div>
                    <div class="stat-card-value">
                        <div>$178,354</div>
                        <div class="stat-card-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="stat-card tickets">
                    <div class="stat-card-title">Support Tickets</div>
                    <div class="stat-card-value">
                        <div>24</div>
                        <div class="stat-card-icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts -->
            <div class="content-section">
                <div class="section-header">
                    <div class="section-title">Performance Overview</div>
                    <div>
                        <button class="section-action">Export</button>
                    </div>
                </div>
                <div class="chart-container">
                    <div class="chart-placeholder">
                        <i class="fas fa-chart-line fa-3x"></i>
                        <p>Monthly user growth and revenue statistics</p>
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="movie-info">
                                    <img src="/api/placeholder/40/60" alt="Movie" class="movie-poster">
                                    <div>Dune</div>
                                </div>
                            </td>
                            <td>May 20, 2025</td>
                            <td>Sci-Fi</td>
                            <td>7.8</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="movie-info">
                                    <img src="/api/placeholder/40/60" alt="Movie" class="movie-poster">
                                    <div>No Time to Die</div>
                                </div>
                            </td>
                            <td>May 18, 2025</td>
                            <td>Action</td>
                            <td>8.3</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="movie-info">
                                    <img src="/api/placeholder/40/60" alt="Movie" class="movie-poster">
                                    <div>The Matrix Resurrections</div>
                                </div>
                            </td>
                            <td>May 15, 2025</td>
                            <td>Sci-Fi</td>
                            <td>7.5</td>
                            <td><span class="status-badge status-active">Active</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="movie-info">
                                    <img src="/api/placeholder/40/60" alt="Movie" class="movie-poster">
                                    <div>Spider-Man: No Way Home</div>
                                </div>
                            </td>
                            <td>May 12, 2025</td>
                            <td>Action</td>
                            <td>8.1</td>
                            <td><span class="status-badge status-pending">Processing</span></td>
                        </tr>
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
                    <div class="user-card">
                        <img src="/api/placeholder/50/50" alt="User" class="user-avatar">
                        <div class="user-info">
                            <div class="user-name">Sarah Johnson</div>
                            <div class="user-email">sarah.j@example.com</div>
                            <div class="user-status">
                                <span class="status-dot dot-active"></span> Active
                            </div>
                        </div>
                    </div>
                    <div class="user-card">
                        <img src="/api/placeholder/50/50" alt="User" class="user-avatar">
                        <div class="user-info">
                            <div class="user-name">Michael Smith</div>
                            <div class="user-email">m.smith@example.com</div>
                            <div class="user-status">
                                <span class="status-dot dot-active"></span> Active
                            </div>
                        </div>
                    </div>
                    <div class="user-card">
                        <img src="/api/placeholder/50/50" alt="User" class="user-avatar">
                        <div class="user-info">
                            <div class="user-name">Emma Davis</div>
                            <div class="user-email">emma.d@example.com</div>
                            <div class="user-status">
                                <span class="status-dot dot-inactive"></span> Inactive
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Payments -->
            <div class="content-section">
                <div class="section-header">
                    <div class="section-title">Recent Payments</div>
                    <div>
                        <button class="section-action">View All</button>
                    </div>
                </div>
                <div>
                    <div class="payment-item">
                        <div class="payment-user">
                            <img src="/api/placeholder/30/30" alt="User" class="payment-user-avatar">
                            <div>
                                <div>Robert Wilson</div>
                                <div class="payment-date">May 21, 2025</div>
                            </div>
                        </div>
                        <div class="payment-amount">$14.99</div>
                    </div>
                    <div class="payment-item">
                        <div class="payment-user">
                            <img src="/api/placeholder/30/30" alt="User" class="payment-user-avatar">
                            <div>
                                <div>Olivia Thompson</div>
                                <div class="payment-date">May 20, 2025</div>
                            </div>
                        </div>
                        <div class="payment-amount">$19.99</div>
                    </div>
                    <div class="payment-item">
                        <div class="payment-user">
                            <img src="/api/placeholder/30/30" alt="User" class="payment-user-avatar">
                            <div>
                                <div>Daniel Moore</div>
                                <div class="payment-date">May 19, 2025</div>
                            </div>
                        </div>
                        <div class="payment-amount">$14.99</div>
                    </div>
                    <div class="payment-item">
                        <div class="payment-user">
                            <img src="/api/placeholder/30/30" alt="User" class="payment-user-avatar">
                            <div>
                                <div>Sophia Clark</div>
                                <div class="payment-date">May 18, 2025</div>
                            </div>
                        </div>
                        <div class="payment-amount">$24.99</div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
    
    {{-- <script>
        // Add event listeners for sidebar navigation
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all items
                document.querySelectorAll('.nav-item').forEach(i => {
                    i.classList.remove('active');
                });
                
                // Add active class to clicked item
                this.classList.add('active');
                
                // You would normally navigate to different pages here
                // For this demo, we'll just update the page title
                const pageTitle = this.querySelector('span').textContent;
                document.querySelector('.page-title').textContent = pageTitle;
            });
        });
    </script> --}}
