@extends('layouts.admin')

@section('content')

<div class="main-content">
    <div class="header">
        <div class="page-title">Users Management</div>
        <div class="admin-profile">
            <span class="badge" style="background: #3cd866; padding: 4px 15px; border-radius: 15px; font-weight: 600; color: #fff">{{ Auth::user()->name }}</span>
        </div>
    </div>

    <div class="flex-wrap gap-2 d-flex justify-content-between align-items-center">
        <h3 class="mb-4 fw-bold" style="color:var(--accent)">All Users</h3>
    </div>

    <div class="p-0 users-table-container" style="margin-top: 20px">
        <div class="table-responsive">
            <table class="table mb-0 align-middle users-table table-hover">
                <thead class="align-middle">
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Join Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td class="text-center">
                            <div class="user-details">
                                <h4>{{ $user['name'] }}</h4>
                            </div>
                        </td>
                        <td>{{ $user['email'] }}</td>
                        <td><span class="role-badge role-user">{{ $user['role'] }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($user['created_at'])->format('M d, Y') }}</td>
                        <td><span class="status-badge status-active">Active</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

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
    .users-header,
    .search-filter-bar,
    .users-table-container,
    .bulk-actions {
        background: var(--primary);
        color: var(--text);
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
    }

    .header,
    .users-header {
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

    .admin-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .admin-profile img {
        border: 2px solid var(--accent);
        border-radius: 50%;
        width: 40px;
        height: 40px;
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

    .users-table-container {
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

    .users-table {
        min-width: 1000px;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .users-table th {
        background: var(--primary);
        color: var(--accent);
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1.2rem 0.75rem;
        border-bottom: 2px solid var(--secondary);
    }

    .users-table td {
        background: var(--primary);
        color: var(--text);
        padding: 1rem 0.75rem;
        border-bottom: 1px solid var(--secondary);
        vertical-align: middle;
        text-align: center;
    }

    .users-table tbody tr:hover {
        background: rgba(0, 168, 255, 0.05);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--accent);
    }

    .user-details h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: var(--text);
    }

    .user-details p {
        margin: 0;
        font-size: 0.85rem;
        color: var(--text-secondary);
    }

    /* Role Badges */
    .role-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .role-user {
        background: rgba(46, 204, 113, 0.2);
        color: var(--success);
        border: 1px solid var(--success);
    }

    .role-admin {
        background: rgba(231, 76, 60, 0.2);
        color: var(--danger);
        border: 1px solid var(--danger);
    }

    .role-moderator {
        background: rgba(243, 156, 18, 0.2);
        color: var(--warning);
        border: 1px solid var(--warning);
    }

    /* Subscription Badges */
    .subscription-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .sub-premium {
        background: rgba(0, 168, 255, 0.2);
        color: var(--accent);
        border: 1px solid var(--accent);
    }

    .sub-standard {
        background: rgba(243, 156, 18, 0.2);
        color: var(--warning);
        border: 1px solid var(--warning);
    }

    .sub-free {
        background: rgba(160, 160, 160, 0.2);
        color: var(--text-secondary);
        border: 1px solid var(--text-secondary);
    }

    /* Status Badges */
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-active {
        background: rgba(46, 204, 113, 0.2);
        color: var(--success);
        border: 1px solid var(--success);
    }

    .status-pending {
        background: rgba(243, 156, 18, 0.2);
        color: var(--warning);
        border: 1px solid var(--warning);
    }

    .status-inactive {
        background: rgba(231, 76, 60, 0.2);
        color: var(--danger);
        border: 1px solid var(--danger);
    }

    /* Action Buttons */
    .actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        background: var(--secondary);
        border: 1px solid var(--accent);
        color: var(--accent);
        width: 36px;
        height: 36px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 0.9rem;
    }

    .action-btn:hover {
        background: var(--accent);
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 168, 255, 0.3);
    }

    .action-btn.delete:hover {
        background: var(--danger);
        border-color: var(--danger);
        box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .main-content {
            padding: 1rem;
        }

        .users-table th,
        .users-table td {
            padding: 0.75rem 0.5rem;
            font-size: 0.95rem;
        }

        .user-details h4 {
            font-size: 0.95rem;
        }
    }

    @media (max-width: 767.98px) {
        .main-content {
            padding: 0.5rem;
        }

        .users-table {
            min-width: 800px;
            font-size: 0.92rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
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

        .header {
            padding: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
        }
    }
</style>


@endsection
