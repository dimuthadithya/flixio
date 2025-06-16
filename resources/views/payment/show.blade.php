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
                    <div class="error-message" id="cardNameError" style="color: #ff3b30; font-size: 12px; margin-top: 4px;"></div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" name="cardNumber" maxlength="16" required
                        class="form-input" placeholder="1234 5678 9012 3456">
                    <div class="error-message" id="cardNumberError" style="color: #ff3b30; font-size: 12px; margin-top: 4px;"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="expiryDate">Expiry Date</label> <input type="text" id="expiryDate" name="expiryDate" maxlength="5"
                            placeholder="MM/YY" required class="form-input">
                        <div class="error-message" id="expiryDateError" style="color: #ff3b30; font-size: 12px; margin-top: 4px;"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cvv">Security Code (CVV)</label> <input type="number" id="cvv" name="cvv" required min="100" max="999"
                            class="form-input" placeholder="123" oninput="javascript: if (this.value.length > 3) this.value = this.value.slice(0, 3);">
                        <div class="error-message" id="cvvError" style="color: #ff3b30; font-size: 12px; margin-top: 4px;"></div>
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
        const submitButton = document.getElementById('submitButton'); // Validation functions
        const validators = {
            cardName: (value) => {
                if (!value) return '';
                if (value.length < 3) return '⚠ Name must be at least 3 characters';
                if (!/^[a-zA-Z\s]+$/.test(value)) return '⚠ Name can only contain letters and spaces';
                if (value.length >= 3 && /^[a-zA-Z\s]+$/.test(value)) return '';
                return '';
            },

            cardNumber: (value) => {
                if (!value) return '';
                if (value.length !== 16) return '⚠ Card number must be 16 digits';
                if (!/^\d+$/.test(value)) return '⚠ Card number must contain only digits';
                return '';
            },

            cvv: (value) => {
                if (!value) return '';
                if (value.length !== 3) return '⚠ CVV must be a 3-digit number';
                if (!/^\d+$/.test(value)) return '⚠ CVV must contain only digits';
                if (parseInt(value) < 100 || parseInt(value) > 999) return '⚠ Invalid CVV';
                return '';
            },

            expiryDate: (value) => {
                if (!value) return '';
                if (!/^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(value)) return '⚠ Please enter a valid date (MM/YY)';

                const [month, year] = value.split('/');
                const expiry = new Date(2000 + parseInt(year), parseInt(month) - 1);
                const today = new Date();

                if (expiry < today) return '⚠ Card has expired';
                return '';
            }
        }; // Generic validation function
        function validateField(field, value) {
            const input = document.getElementById(field);
            const error = document.getElementById(`${field}Error`);
            const errorMessage = validators[field](value);

            if (errorMessage) {
                error.textContent = errorMessage;
                error.style.color = '#ff3b30';
                error.classList.add('visible');
                input.style.borderColor = '#ff3b30';
                return false;
            } else {
                if (value && value.length > 0) {
                    error.textContent = '✓ Valid';
                    error.style.color = '#34c759';
                    input.style.borderColor = '#34c759';
                    error.classList.add('visible');
                } else {
                    error.classList.remove('visible');
                    input.style.borderColor = '';
                }
                return true;
            }
        }

        // Add validation events to all fields
        ['cardName', 'cardNumber', 'cvv', 'expiryDate'].forEach(field => {
            const element = document.getElementById(field);

            // Validate on input
            element.addEventListener('input', function(e) {
                // Special formatting for card number
                if (field === 'cardNumber') {
                    this.value = this.value.replace(/\D/g, '');
                }

                // Special formatting for expiry date
                if (field === 'expiryDate') {
                    let value = this.value.replace(/\D/g, '');
                    if (value.length >= 2) {
                        value = value.substring(0, 2) + '/' + value.substring(2);
                    }
                    this.value = value.substring(0, 5);
                }

                validateField(field, this.value);
            });

            // Validate on blur
            element.addEventListener('blur', function() {
                validateField(field, this.value);
            });

            // Validate on change
            element.addEventListener('change', function() {
                validateField(field, this.value);
            });
        });

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

            // Validate all fields before submission
            const fields = ['cardName', 'cardNumber', 'cvv', 'expiryDate'];
            const isValid = fields.every(field =>
                validateField(field, document.getElementById(field).value)
            );

            if (isValid) {
                submitButton.classList.add('loading');
                submitButton.disabled = true;

                // Show success message
                const successMessage = document.createElement('div');
                successMessage.className = 'success-message';
                successMessage.textContent = 'Processing payment...';
                form.appendChild(successMessage);

                // Submit the form after a short delay to show the loading state
                setTimeout(() => {
                    this.submit();
                }, 1000);
            } else {
                // Scroll to the first error
                const firstError = document.querySelector('.error-message.visible');
                if (firstError) {
                    firstError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }
        });
    });
</script>
@endpush
@endsection