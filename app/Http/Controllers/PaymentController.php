<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show(Movie $movie)
    {
        // If user has already paid, redirect to watch page
        if ($movie->hasPaid(Auth::id())) {
            return redirect()->route('movie.play', $movie->id);
        }

        return view('payment.show', [
            'movie' => $movie
        ]);
    }

    public function process(Request $request, Movie $movie)
    {
        // Check if user has already paid
        if ($movie->hasPaid(Auth::id())) {
            return redirect()->route('movie.play', $movie->id);
        }

        // Validate the payment form
        $request->validate([
            'cardName' => 'required|min:3',
            'cardNumber' => 'required|size:16',
            'expiryDate' => ['required', 'regex:#^(0[1-9]|1[0-2])/([0-9]{2})$#'],
            'cvv' => 'required|digits:3',
        ]);

        // Generate a unique transaction ID
        $transactionId = 'TXN-' . strtoupper(Str::random(8));

        // Store the payment record
        UserPayment::create([
            'user_id' => Auth::id(),
            'movie_id' => $movie->id,
            'transaction_id' => $transactionId,
            'amount' => 9.99 // Replace with actual movie price
        ]);

        // Mask the card number for display
        $maskedCard = str_repeat('*', 12) . substr($request->cardNumber, -4);

        // Get the current date/time for the transaction
        $transactionDate = Carbon::now();

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
