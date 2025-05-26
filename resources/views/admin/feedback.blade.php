@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="header">
        <div class="page-title">User Feedback</div>
        <div class="admin-profile">
            <span>Admin User</span>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold" style="color:var(--accent)">All Feedback</h3>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="feedback-table-container p-0">
        <div class="table-responsive">
            <table class="table align-middle feedback-table table-hover mb-0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->user ? $feedback->user->name : 'Anonymous' }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td>{{ $feedback->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $feedbacks->links() }}
    </div>
</div>

<style>
    .feedback-table-container {
        background: var(--primary);
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .feedback-table {
        color: var(--text);
    }

    .feedback-table th {
        background: var(--secondary);
        color: var(--text-secondary);
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.85rem;
        padding: 1rem;
    }

    .feedback-table td {
        padding: 1rem;
        vertical-align: middle;
    }

    .feedback-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.05);
    }
</style>
@endsection