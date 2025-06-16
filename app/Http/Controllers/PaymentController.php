<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function show(Movie $movie)
    {
        return view('payment.show', [
            'movie' => $movie
        ]);
    }

    public function process(Request $request, Movie $movie)
    {
        // Validate the payment form
        $request->validate([
            'cardName' => 'required|min:3',
            'cardNumber' => 'required|size:16',
            'expiryDate' => ['required', 'regex:#^(0[1-9]|1[0-2])/([0-9]{2})$#'],
            'cvv' => 'required|digits:3',
        ]);

        // Generate a unique transaction ID
        $transactionId = 'TXN-' . strtoupper(Str::random(8));

        // Mask the card number for display
        $maskedCard = str_repeat('*', 12) . substr($request->cardNumber, -4);

        // Get the current date/time for the transaction
        $transactionDate = Carbon::now();

        // In a real application, you would process the payment here
        // For now, we'll just show the success page with transaction details
        return view('payment.success', [
            'movie' => $movie,
            'transactionId' => $transactionId,
            'cardName' => $request->cardName,
            'maskedCard' => $maskedCard,
            'amount' => 9.99, // Replace with actual movie price
            'date' => $transactionDate->format('M d, Y H:i:s'),
        ]);
    }
}
