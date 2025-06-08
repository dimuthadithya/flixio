  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Flixio Admin Dashboard</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
      <link rel="icon" href="{{ asset('/favicon.ico') }}">
      @stack('styles')
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

          .nav-item:hover,
          .nav-item.active {
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
      <!-- Sidebar -->
      <div class="sidebar">
          <div class="logo">
              <i class="fas fa-film"></i>
              <a style="text-decoration: none" href="{{ route('welcome') }}"><span>Flixio</span></a>
          </div>
          <div class="nav-menu">
              <a href="{{ route('admin.dashboard') }}" style="text-decoration: none; color: inherit;">
                  <div class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                      <i class="fas fa-tachometer-alt"></i>
                      <span>Dashboard</span>
                  </div>
              </a>
              <a href="{{ route('admin.movies') }}" style="text-decoration: none; color: inherit;">
                  <div class="nav-item {{ request()->is('admin/movies') ? 'active' : '' }}">
                      <i class="fas fa-film"></i>
                      <span>Movies</span>
                  </div>
              </a>
              <a href="{{ route('admin.users') }}" style="text-decoration: none; color: inherit;">
                  <div class="nav-item {{ request()->is('admin/users') ? 'active' : '' }}">
                      <i class="fas fa-users"></i>
                      <span>Users</span>
                  </div>
              </a>
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

      @yield('content')

      </div>
      </div>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      @stack('scripts')
  </body>

  </html>