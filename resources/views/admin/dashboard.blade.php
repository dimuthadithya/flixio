<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flixio Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--secondary);
            color: var(--text);
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--primary);
            padding: 20px 0;
            height: 100vh;
            position: fixed;
            transition: all 0.3s;
        }
        
        .logo {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: flex-start;
            font-size: 24px;
            font-weight: bold;
            color: var(--accent);
        }
        
        .logo span {
            color: var(--text);
            margin-left: 5px;
        }
        
        .nav-menu {
            margin-top: 30px;
        }
        
        .nav-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--text-secondary);
        }
        
        .nav-item:hover, .nav-item.active {
            background-color: rgba(0, 168, 255, 0.1);
            color: var(--accent);
            border-left: 3px solid var(--accent);
        }
        
        .nav-item i {
            width: 25px;
            margin-right: 10px;
        }
        
        .nav-item.active {
            color: var(--accent);
        }
        
        .bottom-nav {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: bold;
        }
        
        .admin-profile {
            display: flex;
            align-items: center;
        }
        
        .admin-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        /* Dashboard Cards */
        .stat-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background-color: var(--primary);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card-title {
            color: var(--text-secondary);
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .stat-card-value {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .stat-card-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(0, 168, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
        }
        
        .stat-card.users .stat-card-icon {
            background-color: rgba(46, 204, 113, 0.1);
            color: var(--success);
        }
        
        .stat-card.revenue .stat-card-icon {
            background-color: rgba(243, 156, 18, 0.1);
            color: var(--warning);
        }
        
        .stat-card.tickets .stat-card-icon {
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--danger);
        }
        
        /* Content Sections */
        .content-section {
            background-color: var(--primary);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .section-title {
            font-size: 18px;
            font-weight: bold;
        }
        
        .section-action {
            background-color: var(--accent);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .section-action:hover {
            background-color: #0088cc;
        }
        
        /* Recent Movies Table */
        .recent-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .recent-table th {
            text-align: left;
            padding: 12px;
            background-color: rgba(0, 0, 0, 0.1);
            color: var(--text-secondary);
            font-weight: normal;
        }
        
        .recent-table td {
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .recent-table tr:last-child td {
            border-bottom: none;
        }
        
        .movie-info {
            display: flex;
            align-items: center;
        }
        
        .movie-poster {
            width: 40px;
            height: 60px;
            border-radius: 4px;
            margin-right: 10px;
            object-fit: cover;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .status-active {
            background-color: rgba(46, 204, 113, 0.1);
            color: var(--success);
        }
        
        .status-pending {
            background-color: rgba(243, 156, 18, 0.1);
            color: var(--warning);
        }
        
        /* Recent Users */
        .user-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
        
        .user-card {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        
        .user-info {
            flex: 1;
        }
        
        .user-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .user-email {
            font-size: 12px;
            color: var(--text-secondary);
        }
        
        .user-status {
            font-size: 12px;
            margin-top: 5px;
        }
        
        .status-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 5px;
        }
        
        .dot-active {
            background-color: var(--success);
        }
        
        .dot-inactive {
            background-color: var(--danger);
        }

        /* Recent Payments */
        .payment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .payment-item:last-child {
            border-bottom: none;
        }
        
        .payment-user {
            display: flex;
            align-items: center;
        }
        
        .payment-user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .payment-amount {
            font-weight: bold;
            color: var(--success);
        }
        
        .payment-date {
            color: var(--text-secondary);
            font-size: 12px;
        }
        
        /* Charts */
        .chart-container {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .chart-placeholder {
            text-align: center;
            color: var(--text-secondary);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .stat-cards {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .user-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                padding: 20px 0;
            }
            
            .logo span {
                display: none;
            }
            
            .nav-item span {
                display: none;
            }
            
            .main-content {
                margin-left: 80px;
            }
            
            .stat-cards {
                grid-template-columns: 1fr;
            }
            
            .user-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-film"></i>
                <span>Flixio</span>
            </div>
            <div class="nav-menu">
                <div class="nav-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-film"></i>
                    <span>Movies</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-tv"></i>
                    <span>TV Shows</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-credit-card"></i>
                    <span>Payments</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </div>
            </div>
            <div class="bottom-nav">
                <div class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; color: inherit; cursor: pointer;">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sign Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
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
    </div>
    
    <script>
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
    </script>
</body>
</html>