@extends('layouts.app')

@push('styles')
<style>
    .success-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #0a192f 0%, #112240 100%);
        padding: 48px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .success-card {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        padding: 40px;
        text-align: center;
        backdrop-filter: blur(10px);
    }

    .success-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 32px;
        box-shadow: 0 10px 20px rgba(34, 197, 94, 0.2);
        animation: scaleIn 0.5s ease-out;
    }

    @keyframes scaleIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .success-icon svg {
        width: 50px;
        height: 50px;
        color: white;
        animation: checkmark 0.5s ease-out 0.5s both;
    }

    @keyframes checkmark {
        0% {
            transform: scale(0);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }

    .success-title {
        font-size: 32px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
        animation: fadeInUp 0.5s ease-out 0.3s both;
    }

    .success-message {
        color: #475569;
        margin-bottom: 40px;
        font-size: 18px;
        line-height: 1.6;
        animation: fadeInUp 0.5s ease-out 0.4s both;
    }

    @keyframes fadeInUp {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .order-details {
        background: rgba(241, 245, 249, 0.8);
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 40px;
        text-align: left;
        animation: fadeInUp 0.5s ease-out 0.5s both;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(203, 213, 225, 0.5);
        color: #334155;
    }

    .detail-row:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        font-size: 16px;
    }

    .detail-value {
        font-size: 16px;
        color: #0f172a;
    }

    .watch-button {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        padding: 16px 40px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        font-size: 18px;
        display: inline-block;
        transition: all 0.3s ease;
        animation: fadeInUp 0.5s ease-out 0.6s both;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .watch-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    }

    .watch-button:active {
        transform: translateY(-1px);
    }
</style>
@endpush

@section('content')
<div class="success-container">
    <div class="success-card">
        <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h1 class="success-title">Payment Successful!</h1>
        <p class="success-message">Great news! Your payment has been processed and you're ready to enjoy your movie.</p>

        <div class="order-details">
            <div class="detail-row">
                <span class="detail-label">Movie Title</span>
                <span class="detail-value">{{ $movie->title }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Amount Paid</span>
                <span class="detail-value">${{ number_format($amount, 2) }} USD</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Transaction ID</span>
                <span class="detail-value">{{ $transactionId }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Purchase Date</span>
                <span class="detail-value">{{ $date }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Card Holder</span>
                <span class="detail-value">{{ $cardName }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Card Number</span>
                <span class="detail-value">{{ $maskedCard }}</span>
            </div>
        </div>

        <a href="{{ route('movie.play', $movie->id) }}" class="watch-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px; height: 24px; margin-right: 8px; vertical-align: middle;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Watch Movie Now
        </a>
    </div>
</div>
</div>
</div>
@endsection