@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}">
@endpush

@section('content')
<div class="payment-container">
    <div class="payment-card">
        <div class="payment-box">
            <h2 class="payment-title">Complete Your Purchase</h2>

            <div class="movie-info">
                <div class="movie-title">{{ $movie->title }}</div>
                <div class="movie-price">$4.99 USD</div>
            </div>

            <form id="paymentForm" action="{{ route('payment.process', $movie->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="cardName">Name on Card</label>
                    <input type="text" id="cardName" name="cardName" required class="form-input"
                        placeholder="e.g. John Smith">
                    <div class="error-message" id="cardNameError"></div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" name="cardNumber" maxlength="16" required
                        class="form-input" placeholder="1234 5678 9012 3456">
                    <div class="error-message" id="cardNumberError"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="expiryDate">Expiry Date</label>
                        <input type="text" id="expiryDate" name="expiryDate" maxlength="5"
                            placeholder="MM/YY" required class="form-input">
                        <div class="error-message" id="expiryDateError"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cvv">Security Code (CVV)</label>
                        <input type="number" id="cvv" name="cvv" required min="100" max="999"
                            class="form-input" placeholder="123" oninput="javascript: if (this.value.length > 3) this.value = this.value.slice(0, 3);">
                        <div class="error-message" id="cvvError"></div>
                    </div>
                </div>

                <div class="button-group">
                    <a href="{{ route('movie.show', $movie->id) }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-submit" id="submitButton">Pay Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('paymentForm');
        const cardNumber = document.getElementById('cardNumber');
        const cvv = document.getElementById('cvv');
        const expiryDate = document.getElementById('expiryDate');
        const cardName = document.getElementById('cardName');
        const submitButton = document.getElementById('submitButton');

        // Format card number with spaces
        cardNumber.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            this.value = value;
            const error = document.getElementById('cardNumberError');
            if (value.length !== 16) {
                error.textContent = 'Card number must be 16 digits';
                error.classList.add('visible');
            } else {
                error.classList.remove('visible');
            }
        }); // CVV validation
        cvv.addEventListener('input', function(e) {
            // Remove any non-numeric characters
            this.value = this.value.replace(/\D/g, '');

            const error = document.getElementById('cvvError');
            const cvvNum = parseInt(this.value);

            if (this.value.length !== 3 || cvvNum < 100 || cvvNum > 999) {
                error.textContent = 'CVV must be a 3-digit number';
                error.classList.add('visible');
            } else {
                error.classList.remove('visible');
            }
        });

        // Expiry date validation and formatting
        expiryDate.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2);
            }
            this.value = value.substring(0, 5);

            const error = document.getElementById('expiryDateError');
            if (!/^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(this.value)) {
                error.textContent = 'Please enter a valid date (MM/YY)';
                error.classList.add('visible');
            } else {
                error.classList.remove('visible');
            }
        });

        // Card name validation
        cardName.addEventListener('input', function(e) {
            const error = document.getElementById('cardNameError');
            if (this.value.length < 3) {
                error.textContent = 'Name must be at least 3 characters';
                error.classList.add('visible');
            } else {
                error.classList.remove('visible');
            }
        });

        // Form submission with loading state
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let hasErrors = false;

            // Validate all fields
            if (cardNumber.value.length !== 16) {
                document.getElementById('cardNumberError').classList.add('visible');
                hasErrors = true;
            }

            if (cvv.value.length !== 3) {
                document.getElementById('cvvError').classList.add('visible');
                hasErrors = true;
            }

            if (!/^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(expiryDate.value)) {
                document.getElementById('expiryDateError').classList.add('visible');
                hasErrors = true;
            }

            if (cardName.value.length < 3) {
                document.getElementById('cardNameError').classList.add('visible');
                hasErrors = true;
            }

            // If no errors, submit with loading state
            if (!hasErrors) {
                submitButton.classList.add('loading');
                this.submit();
            }
        });
    });
</script>
@endpush
@endsection